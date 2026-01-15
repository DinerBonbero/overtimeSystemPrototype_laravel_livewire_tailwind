<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class OvertimeSheet extends Model
{
    /** @use HasFactory<\Database\Factories\OvertimeSheetFactory> */
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function overtimeRequest(): HasOne
    {
        return $this->hasOne(OvertimeRequest::class);
    }

    public function overtimeReport(): HasOne
    {
        return $this->hasOne(OvertimeReport::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function division(): belongsTo
    {
        return $this->belongsTo(Division::class);
    }
}
