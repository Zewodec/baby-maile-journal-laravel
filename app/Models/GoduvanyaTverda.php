<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoduvanyaTverda extends Model
{
    use HasFactory;


    protected $fillable = [
        'datetime',
        'goduvanya_type',
        'group1',
        'group2',
        'group3',
        'tverda_time',
        'user_id',
        'child_id',
    ];

    protected $casts = [
        'datetime' => 'datetime',
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
