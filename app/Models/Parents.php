<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_1_image',
        'parent_1_first_name',
        'parent_1_last_name',
        'parent_2_image',
        'parent_2_first_name',
        'parent_2_last_name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
