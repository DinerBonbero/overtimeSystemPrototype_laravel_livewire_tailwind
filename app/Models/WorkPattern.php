<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkPattern extends Model
{
    
    protected $guarded = [
        'id'
    ];

    public function overtimeRequests()
    {
        return $this->hasMany(OvertimeRequest::class);
    }
}
