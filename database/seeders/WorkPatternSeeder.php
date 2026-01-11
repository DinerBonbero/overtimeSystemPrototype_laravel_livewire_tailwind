<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 勤務パターン	出勤	退勤
        // 早出A	5:30	14:15
        // 早出B	6:00	14:45
        // 早出C	6:30	15:15
        // 早出D	7:00	15:45
        // 早出E	7:30	16:15
        // 早出F	8:00	16:45
        // 通常A	8:30	17:15
        // 通常B	9:00	17:45
        // 通常C	9:30	18:15
        // 遅出A	10:00	18:45
        // 遅出B	10:30	19:15
        // 遅出C	11:00	19:45
        // 遅出D	11:30	20:15
        // 遅出E	12:00	20:45
        // 遅出F	12:30	21:15
        // 遅出G	13:00	21:45

        DB::table('work_patterns')->insert([
            ['name' => '早出A', 'start_time' => '05:30:00', 'end_time' => '14:15:00'],
            ['name' => '早出B', 'start_time' => '06:00:00', 'end_time' => '14:45:00'],
            ['name' => '早出C', 'start_time' => '06:30:00', 'end_time' => '15:15:00'],
            ['name' => '早出D', 'start_time' => '07:00:00', 'end_time' => '15:45:00'],
            ['name' => '早出E', 'start_time' => '07:30:00', 'end_time' => '16:15:00'],
            ['name' => '早出F', 'start_time' => '08:00:00', 'end_time' => '16:45:00'],
            ['name' => '通常A', 'start_time' => '08:30:00', 'end_time' => '17:15:00'],
            ['name' => '通常B', 'start_time' => '09:00:00', 'end_time' => '17:45:00'],
            ['name' => '通常C', 'start_time' => '09:30:00', 'end_time' => '18:15:00'],
            ['name' => '遅出A', 'start_time' => '10:00:00', 'end_time' => '18:45:00'],
            ['name' => '遅出B', 'start_time' => '10:30:00', 'end_time' => '19:15:00'],
            ['name' => '遅出C', 'start_time' => '11:00:00', 'end_time' => '19:45:00'],
            ['name' => '遅出D', 'start_time' => '11:30:00', 'end_time' => '20:15:00'],
            ['name' => '遅出E', 'start_time' => '12:00:00', 'end_time' => '20:45:00'],
            ['name' => '遅出F', 'start_time' => '12:30:00', 'end_time' => '21:15:00'],
            ['name' => '遅出G', 'start_time' => '13:00:00', 'end_time' => '21:45:00']
        ]);
    }
}
