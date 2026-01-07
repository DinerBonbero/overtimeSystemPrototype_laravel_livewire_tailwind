<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //呼び出す順番に注意　※未設定
        // $this->call([
        //     UserSeeder::class,
        //     OvertimeSheetSeeder::class,
        //     OvertimeReportSeeder::class,
        //     OvertimeRequestSeeder::class,
        //     DivisionSeeder::class,
        //     RoleSeeder::class,
        //     WorkPatternSeeder::class,
        // ]);

        //\App\Models\User::truncate();
    }
}
