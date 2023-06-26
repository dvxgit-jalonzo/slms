<?php

namespace Database\Seeders;

use App\Models\SoftwareTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoftwareTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_INITVAL",
            "value" => "0",
            "label" => "Initial Value"
        ]);

        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_LICTYPE",
            "value" => "0",
            "label" => "License Type"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_SERIAL",
            "value" => null,
            "label" => "Serial Number"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_COMPANY",
            "value" => null,
            "label" => "Licensed To"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_EMAIL",
            "value" => null,
            "label" => "Email Address"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_DATEINSTALL",
            "value" => null,
            "label" => "Installation"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_DATETODAY",
            "value" => null,
            "label" => "Date Today"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_DATEEXPIRE",
            "value" => null,
            "label" => "Expiration"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_SMAEXPIRE",
            "value" => null,
            "label" => "Sma Expiration"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_EXPDAYS",
            "value" => null,
            "label" => "Expiration Days"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_PORTS",
            "value" => null,
            "label" => "Ports"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_MAILBOXES",
            "value" => null,
            "label" => "Mailboxes"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_LANGUAGES",
            "value" => "2",
            "label" => "Languages"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_UUID",
            "value" => null,
            "label" => "User Unique Id"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_VOICEMAIL",
            "value" => "1",
            "label" => "Voicemail"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_HOSPITALITY",
            "value" => "0",
            "label" => "Hospitality"
        ]);
        SoftwareTemplate::create([
            "software_id" => 1,
            "name" => "_CRUISE",
            "value" => "0",
            "label" => "Cruise"
        ]);



    }
}
