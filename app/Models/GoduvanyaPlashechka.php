<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoduvanyaPlashechka extends Model
{
    use HasFactory;

    protected $fillable = [
        'datetime',
        'plashechka_type',
        'plashechka_amount',
        'plashechka_time',
        'goduvanya_type',
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
