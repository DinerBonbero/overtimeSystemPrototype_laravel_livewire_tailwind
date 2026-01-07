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
        Schema::create('overtime_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('overtime_sheet_id')->constrained();
            $table->foreignId('work_pattern_id')->constrained();
            $table->foreignId('approver_id')->nullable()->constrained('users');
            $table->dateTime('plan_start_at');
            $table->dateTime('plan_end_at');
            $table->string('cause', length: 200);
            $table->dateTime('approved_at')->nullable();
            $table->timestamps();
            //年月日時には物理名にdateではなくatを使う 理由: dateは日付のみを示すが、atは日時を示すため
            //レコードに瞬間に記録するものにはcreated_at,updated_at,approved_atなどのように過去形を使う
            //誕生日や勤務時間のように瞬間ではなく単なる日付や期間などの値にはdateやtimeなどの現在形を使う
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overtime_requests');
    }
};
