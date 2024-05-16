<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChasGri extends Model
{
    use HasFactory;

    protected $fillable = [
        'datetime',
        'activity',
        'tracked_time',
        'user_id',
        'child_id',
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
        'tracked_time' => 'datetime:HH:mm:ss',
    ];
}
