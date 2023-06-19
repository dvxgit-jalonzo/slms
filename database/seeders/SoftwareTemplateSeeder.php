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
            [
                "software_id" => 1,
                "name" => "_INITVAL",
                "value" => "0",
                "label" => "Initial Value"
            ],
            [
                "software_id" => 1,
                "name" => "_LICTYPE",
                "value" => "0",
                "label" => "License Type"
            ],
            [
                "software_id" => 1,
                "name" => "_SERIAL",
                "value" => null,
                "label" => "Serial Number"
            ],
            [
                "software_id" => 1,
                "name" => "_COMPANY",
                "value" => null,
                "label" => "Licensed To"
            ],
            [
                "software_id" => 1,
                "name" => "_EMAIL",
                "value" => null,
                "label" => "Email Address"
            ],
            [
                "software_id" => 1,
                "name" => "_DATEINSATLL",
                "value" => null,
                "label" => "Installation"
            ],
            [
                "software_id" => 1,
                "name" => "_DATETODAY",
                "value" => null,
                "label" => "Date Today"
            ],
            [
                "software_id" => 1,
                "name" => "_DATEEXPIRE",
                "value" => null,
                "label" => "Expiration"
            ],
            [
                "software_id" => 1,
                "name" => "_SMAEXPIRE",
                "value" => null,
                "label" => "Sma Expiration"
            ],
            [
                "software_id" => 1,
                "name" => "_EXPDAYS",
                "value" => null,
                "label" => "Expiration Days"
            ],
            [
                "software_id" => 1,
                "name" => "_PORTS",
                "value" => null,
                "label" => "Ports"
            ],
            [
                "software_id" => 1,
                "name" => "_MAILBOXES",
                "value" => null,
                "label" => "Mailboxes"
            ],
            [
                "software_id" => 1,
                "name" => "_LANGUAGES",
                "value" => "2",
                "label" => "Languages"
            ],
            [
                "software_id" => 1,
                "name" => "_UUID",
                "value" => null,
                "label" => "User Unique Id"
            ],
            [
                "software_id" => 1,
                "name" => "_VOICEMAIL",
                "value" => "1",
                "label" => "Voicemail"
            ],
            [
                "software_id" => 1,
                "name" => "_HOSPITALITY",
                "value" => "0",
                "label" => "Hospitality"
            ],
            [
                "software_id" => 1,
                "name" => "_CRUISE",
                "value" => "0",
                "label" => "Cruise"
            ]
        ]);

    }
}
