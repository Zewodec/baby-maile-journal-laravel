<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Son extends Model
{
    use HasFactory;

    protected $fillable = [
      "date",
      "time",
      "user_id",
      "child_id",
    ];

    protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function child()
    {
        return $this->belongsTo(Child::class);
    }
}
