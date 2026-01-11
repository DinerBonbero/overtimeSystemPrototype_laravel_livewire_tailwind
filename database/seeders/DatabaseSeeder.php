<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //呼び出す順番に注意　※未設定
        $this->call([
            DivisionSeeder::class,
            RoleSeeder::class,
            WorkPatternSeeder::class,
            UserSeeder::class, //ログイン用の各社員のマスタシーダ
            // OvertimeSheetSeeder::class,
            // OvertimeReportSeeder::class,
            // OvertimeRequestSeeder::class,
        ]);

        //↓以下は大人数を想定して

        User::factory()->count(100)->create();

        $roleDivisionIds = [];

        for ($j = 2; $j <= 7; $j++) { //ログイン用のマスタシーダ(営業部)以外の各部署の次長('role_id' => 2)
            $roleDivisionIds[] = ['role_id' => 2, 'division_id' => $j]; //'division_id' => 1は営業部のなので除外
        }

        for ($k = 2; $k <= 7; $k++) { //ログイン用のマスタシーダ(営業部)以外の各部署の課長('role_id' => 3)
            $roleDivisionIds[] = ['role_id' => 3, 'division_id' => $k]; //'division_id' => 1は営業部のなので除外
        }

        for ($l = 2; $l <= 7; $l++) { //ログイン用のマスタシーダ(営業部)以外の各部署の部長('role_id' => 4)
            $roleDivisionIds[] = ['role_id' => 4, 'division_id' => $l]; //'division_id' => 1は営業部のなので除外
        }

        // dd($roleDivisionIds);
        // exit();

        //繰り返し処理などの文（statement）を扱うときは引数の外で扱う

        User::factory()->count(18)->state(new Sequence(...$roleDivisionIds))->create(); //引数にはforなどの値以外のもの文statementなどは入れることができない！時間ロス！
        //Sequence($roleDivisionIds)の引数は可変長引数　@param mixed ...$sequence　※配列リテラルか多次元配列を入れる、多次元配列の場合は…の可変長引数を使用する
        //可変長引数(...$param)は引数の数が不定の場合に使用する。配列の[]を取り除いて個々の値として扱う。

        //\App\Models\User::truncate();
    }
}
