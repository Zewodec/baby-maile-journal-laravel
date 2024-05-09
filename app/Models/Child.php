<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'surname',
        'sex',
        'birthday',
        'vagitnist_date',
        'user_id',
        ];

    protected $casts = [
        'birthday' => 'datetime',
        'vagitnist_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vagitnistVaga()
    {
        return $this->hasMany(VagitnistVaga::class);
    }
}
