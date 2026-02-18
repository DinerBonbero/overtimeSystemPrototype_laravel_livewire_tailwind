<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OvertimeRequest extends Model
{
    /** @use HasFactory<\Database\Factories\OvertimeRequestFactory> */
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function casts(): array //キャスト
    {
        return [
            'plan_start_at' => 'datetime', //bladeでformat('Y年m月d日 H時i分')するため
            'plan_end_at' => 'datetime', //bladeでformat('Y年m月d日 H時i分')するため
        ];
    }

    public function overtimeSheet(): BelongsTo
    {
        return $this->belongsTo(OvertimeSheet::class);
    }

    public function workPattern(): BelongsTo
    {
        return $this->belongsTo(WorkPattern::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id', 'id');
    }
}
