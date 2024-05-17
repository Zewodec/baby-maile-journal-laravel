<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvents extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'text',
        'user_id',
        'child_id',
    ];

    protected $casts = [
        'images' => 'array',
        'date' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(CalendarImages::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
