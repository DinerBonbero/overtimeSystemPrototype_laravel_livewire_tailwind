<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert([

            [
                'name' => '営業部'
            ],
            [
                'name' => '人事部'
            ],
            [
                'name' => '総務部'
            ],
            [
                'name' => '経理部'
            ],
            [
                'name' => '広報部'
            ],
            [
                'name' => '法務部'
            ],
            [
                'name' => 'IT部'
            ]
        ]);
    }
}
