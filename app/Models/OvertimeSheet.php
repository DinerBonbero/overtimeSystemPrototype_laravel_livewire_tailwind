<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OvertimeSheet extends Model
{
    /** @use HasFactory<\Database\Factories\OvertimeSheetFactory> */
    use HasFactory;

    protected $guarded = [
        'id'
    ];
}
