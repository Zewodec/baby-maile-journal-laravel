<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'calendar_events_id',
    ];

    public function calendarEvents()
    {
        return $this->belongsToMany(CalendarEvents::class);
    }
}
