<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikyZdorovya extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'liky_vacine',
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
}
