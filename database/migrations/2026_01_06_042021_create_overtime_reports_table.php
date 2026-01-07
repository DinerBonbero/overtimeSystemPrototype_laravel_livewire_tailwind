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
        Schema::create('overtime_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('overtime_sheet_id')->constrained();
            $table->dateTime('actual_start_at');
            $table->dateTime('actual_end_at');
            $table->unsignedTinyInteger('rest_hours');
            $table->unsignedTinyInteger('rest_minutes');
            $table->string('detail', length: 200);
            $table->timestamps();
            //日付や時刻にはdatetime,timestamp,dateなどを使用する
            //時間の長さにはunsignedTinyIntegerなどの数値型を使用する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overtime_reports');
    }
};
