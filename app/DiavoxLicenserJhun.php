<?php

namespace App;

use Illuminate\Encryption\Encrypter;

class DiavoxLicenserJhun
{
    private static $encryptionKey;

    public static function setEncryptionKey($key)
    {
        self::$encryptionKey = $key;
    }

    public static function encrypt($value)
    {
        $encrypter = new Encrypter(self::$encryptionKey, 'aes-256-cbc');
        return $encrypter->encrypt($value);
    }

    public static function decrypt($encryptedValue)
    {
        $encrypter = new Encrypter(self::$encryptionKey, 'aes-256-cbc');
        return $encrypter->decrypt($encryptedValue);
    }
}
