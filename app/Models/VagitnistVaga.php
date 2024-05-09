<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VagitnistVaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'vaga',
        'week',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->belongsTo(Child::class);
    }

    protected $casts = [
        'date' => 'datetime',
    ];

}
