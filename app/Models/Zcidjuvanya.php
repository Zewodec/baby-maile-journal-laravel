<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zcidjuvanya extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'child_id',
        'date',
        'left_amount',
        'right_amount',
        'left_time',
        'right_time',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function child()
    {
        return $this->belongsTo(Child::class);
    }

    protected $casts = [
        'date' => 'datetime',
        'left_time' => 'datetime',
        'right_time' => 'datetime',
    ];
}
