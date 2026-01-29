<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([

            [
                'division_id' => 1,
                'role_id' => 1,
                'name' => '一般社員1',
                'email' => 'syain1@example.com',
                'password' => Hash::make('syain1'),
                'employee_number' => '0001',
            ],
            [
                'division_id' => 1,
                'role_id' => 1,
                'name' => '一般社員2',
                'email' => 'syain2@example.com',
                'password' => Hash::make('syain2'),
                'employee_number' => '0002',
            ],
            [
                'division_id' => 1,
                'role_id' => 2,
                'name' => '課長',
                'email' => 'katyou1@example.com',
                'password' => Hash::make('katyou1'),
                'employee_number' => '0003',
            ],
            [
                'division_id' => 1,
                'role_id' => 3,
                'name' => '次長',
                'email' => 'jityou1@example.com',
                'password' => Hash::make('jityou1'),
                'employee_number' => '0004',
            ],
            [
                'division_id' => 1,
                'role_id' => 4,
                'name' => '部長',
                'email' => 'butyou1@example.com',
                'password' => Hash::make('butyou1'),
                'employee_number' => '0005',
                //'email_verified_at' => null, ※nullableがデフォルトで記述されているので不要
                //'remember_token' => null,　※nullableがデフォルトで記述されているので不要
                //'created_at' => null,　※timestamp型はnull許容かつnullableがデフォルトで記述されているので不要
                //'updated_at' => null,　※timestamp型はnull許容かつnullableがデフォルトで記述されているので不要
            ],
        ]);
    }
}
