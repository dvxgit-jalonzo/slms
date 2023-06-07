<?php

namespace App\Diavox;

use Carbon\Carbon;
//use DvxgitJsoriano\Logger\Logger;
use Exception;
use Illuminate\Encryption\Encrypter;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class DiavoxLicenser
{
    protected $encrypter;

    protected $cipher = 'AES-256-CBC';

    protected static $key = 'diavoxnetworkincorporated-secret'; // 32 character

    public function __construct()
    {
        $this->encrypter = new Encrypter(self::$key, $this->cipher);
    }

    public function encrypt($data)
    {
//        Logger::configure();

        $decoded_data = json_decode($data, true);

//        Logger::log('data from encrypt', $decoded_data);

        $json = json_encode($decoded_data);

        return $this->encrypter->encryptString($json);
    }

    public function decrypt($payload)
    {
        $json = $this->encrypter->decryptString($payload);

        return json_decode($json, true);
    }

    /**
     * This function is used to get the System UUID of a Linux
     */
    public static function get_system_uuid()
    {
//        Logger::configure();

        $process = new Process(['sudo', '-n', '/usr/sbin/dmidecode', '-s', 'system-uuid']);
        $process->run();

        // executes after the command finishes
        if (! $process->isSuccessful()) {
            abort(403, 'Permission denied.');
            //throw new ProcessFailedException($process);
        }

        $system_uuid = trim($process->getOutput());
//        Logger::log('UUID Output', $system_uuid);

        return $system_uuid;
    }

    /**
     * This function is used to verify if the license is valid or not
     */
    public static function verify_license($sysconfigFile = '/etc/diavox/sysconfig.dat')
    {
//        Logger::configure();
        try {
            $sysconfigFile = '/etc/diavox/sysconfig.dat';
            $sysconfig = file_get_contents($sysconfigFile);
            $lic = new DiavoxLicenser();

            $decodedLicense = $lic->decrypt($sysconfig);

            // get current uuid
            $currentUUID = DiavoxLicenser::get_system_uuid();

            // If the initial value is 0. Generate the temporary license depending on the exp days.
            if ($decodedLicense['_INITVAL'] == 0) {
                $date_now = Carbon::now();
                $date_today = $date_now->toDateString();

                $decodedLicense['_DATEINSTALL'] = $date_today;
                $decodedLicense['_DATETODAY'] = $date_today;
                $decodedLicense['_DATEEXPIRE'] = $date_now->addDays($decodedLicense['_EXPDAYS'])->toDateString();
                $decodedLicense['_SMAEXPIRE'] = $date_now->addDays($decodedLicense['_EXPDAYS'])->toDateString();
                $decodedLicense['_INITVAL'] = 1;  // License Generated
                $decodedLicense['_LICTYPE'] = 0;  // Set 0 as Temporary
                $decodedLicense['_UUID'] = $currentUUID;  // Set uuid

                $decodedLicense = json_encode($decodedLicense);

                // Save the changes
                $encryptedLicense = $lic->encrypt($decodedLicense);
                //return $encryptedLicense;
                file_put_contents($sysconfigFile, $encryptedLicense);

                return ['valid' => true, 'message' => 'License initiated.'];
            }

            if ($decodedLicense['_INITVAL'] == 1) {
                $configUUID = $decodedLicense['_UUID'];
                //$configUUID = 'n89v2523v0975230nv50923n5v0';   // Debugging

                // If the UUID was found to be different.
                if ($configUUID != $currentUUID) {
                    return ['valid' => false, 'message' => 'License has been transferred to another machine.'];
                }

                $configDateInstall = Carbon::parse($decodedLicense['_DATEINSTALL']);
                $configSMAExpire = Carbon::parse($decodedLicense['_SMAEXPIRE']);
                $configDateExpire = Carbon::parse($decodedLicense['_DATEEXPIRE']);
                //$configDateExpire = Carbon::parse('2023-02-20'); // Debugging
                $currentDate = Carbon::now();

                // If the SMA is expired.
                /* if (! $configDateInstall->greaterThanOrEqualTo($currentDate) && $configSMAExpire->lessThanOrEqualTo($currentDate)) {
                    return ['valid' => false, 'message' => 'Service Maintenance Agreement already expired.'];
                } */

                // If the License is expired.
                if (! $configDateInstall->greaterThanOrEqualTo($currentDate) && $configDateExpire->lessThanOrEqualTo($currentDate)) {
                    return ['valid' => false, 'message' => 'License has already expired.'];
                }
            }

            return ['valid' => true, 'message' => 'License valid.'];
        } catch (Exception $ex) {
//            Logger::log('error', $ex->getMessage());

            return ['valid' => false, 'message' => $ex->getMessage()];
        }
    }

    /**
     * This function accepts license configuration key and return the value
     */
    public static function get_license($sysconfigFile = '/etc/diavox/sysconfig.dat')
    {
        $sysconfig = file_get_contents($sysconfigFile);
        $lic = new DiavoxLicenser();

        $decodedLicense = $lic->decrypt($sysconfig);

        return $decodedLicense;
    }

    /**
     * This function accepts license configuration key and return the value
     */
    public static function get_license_value($key, $sysconfigFile = '/etc/diavox/sysconfig.dat')
    {
        $sysconfig = file_get_contents($sysconfigFile);
        $lic = new DiavoxLicenser();

        $decodedLicense = $lic->decrypt($sysconfig);

        return $decodedLicense[$key];
    }
}
