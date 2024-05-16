<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportantEvents extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'child_id',
        'event_name',
        'event_description',
        'event_text',
        'image',
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
