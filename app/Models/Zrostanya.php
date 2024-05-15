<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zrostanya extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'user_id',
        'datetime',
        'length',
        'weight',
    ];

    function child()
    {
        return $this->belongsTo(Child::class);
    }
}
