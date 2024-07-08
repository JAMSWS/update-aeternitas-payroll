<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('departmentlist')->insert([
            ['department' => 'HR Department	', 'created_at' => now(), 'updated_at' => now()],
            ['department' => 'IT Department	', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
