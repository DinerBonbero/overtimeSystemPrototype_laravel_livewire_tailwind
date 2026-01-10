<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('work_patterns', function (Blueprint $table) {//出勤と退勤時刻の追加　※マイグレートファイルは一度しかmigrationできないので、新たにマイグレートファイルを作成して追加
            $table->time('start_time'); //php artisan make:migration add_work_patterns_table_2columns --table=work_patterns ※--table=テーブル名にすることで指定したテーブル名にあわせたマイグレーションファイルを作成
            $table->time('end_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('work_patterns', function (Blueprint $table) {//upで追加したカラムを巻き戻すコード(rollbackなど)
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }
};
