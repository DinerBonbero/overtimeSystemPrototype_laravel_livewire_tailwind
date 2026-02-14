<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkPattern extends Model
{

    protected $guarded = [
        'id'
    ];

    protected function casts(): array //キャスト
    {
        return [
            'start_time' => 'datetime:H:i:s',//時間だけを保存するため、H:i:sでキャスト
            'end_time' => 'datetime:H:i:s',//時間だけを保存するため、H:i:sでキャスト
        ];
    }

    public function overtimeRequests()
    {
        return $this->hasMany(OvertimeRequest::class);
    }
}
