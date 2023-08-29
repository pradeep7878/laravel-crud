<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $employeesData = [
            [
                'name' => 'Ajay',
                'email' => '123@gmail.com',
                'number' => '123'
            ],
            [
                'name' => 'Ajay',
                'email' => '123@gmail.com',
                'number' => '123'
            ],
            [
                'name' => 'Ajay',
                'email' => '123@gmail.com',
                'number' => '123'
            ],
        ];

        DB::table('employees') -> insert($employeesData);

    }


}

