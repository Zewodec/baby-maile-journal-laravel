<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pidguznik extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'child_id',
        'datetime',
        'type',
        'vologist',
        'kaka_color'
    ];

    protected $casts = [
        'datetime' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
