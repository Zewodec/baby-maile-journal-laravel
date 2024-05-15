<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperatureZdorovya extends Model
{
    use HasFactory;

    protected $fillable = [
        'temp',
        'user_id',
        'child_id',
        'date',
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
        'date' => 'datetime',
    ];
}
