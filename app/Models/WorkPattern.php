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
            'start_time' => 'datetime:H:i:s',//bladeでformat('H:i')するため
            'end_time' => 'datetime:H:i:s',//bladeでformat('H:i')するため
        ];
    }

    public function overtimeRequests()
    {
        return $this->hasMany(OvertimeRequest::class);
    }
}
