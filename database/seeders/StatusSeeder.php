<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => 'open'
        ]);

        Status::create([
            'name' => 'in progress'
        ]);


        Status::create([
            'name' => 'resolved'
        ]);
    }
}
