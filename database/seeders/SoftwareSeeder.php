<?php

namespace Database\Seeders;

use App\Models\Software;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Software::create([
            'code' => 'VMR',
            'name' => 'Voice Mail Record',
            'description' => 'sample',
            'with_licensing' => 1
        ]);
    }
}
