<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('positionlist')->insert([
            ['position' => 'SALES AND ADMIN ASSISTANT', 'created_at' => now(), 'updated_at' => now()],
            ['position' => 'BUSINESS DEVELOPMENT HEAD', 'created_at' => now(), 'updated_at' => now()],
            ['position' => 'GENERAL ACCOUNTANT', 'created_at' => now(), 'updated_at' => now()],
            ['position' => 'GENERAL MANAGER', 'created_at' => now(), 'updated_at' => now()],
            ['position' => 'SALES EXECUTIVE	', 'created_at' => now(), 'updated_at' => now()],
            ['position' => 'HR-ADMIN ASST.', 'created_at' => now(), 'updated_at' => now()],
            ['position' => 'MARKETING OFFICER	', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
