<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoduvanyaGrudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'datetime',
        'left_time',
        'right_time',
        'goduvanya_type',
        'user_id',
        'child_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    protected $casts = [
        'datetime' => 'datetime',
    ];
}
