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
        'child_image',
        'user_id',
        ];

    public function settings()
    {
        return $this->hasOne(Settings::class);
    }

    public function getBirthday()
    {
        return $this->settings()->first()->pology_date ?? null;
    }

    public function getDataZachatya()
    {
        return $this->settings()->first()->data_zachatya ?? null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vagitnistVaga()
    {
        return $this->hasMany(VagitnistVaga::class);
    }

    public function son()
    {
        return $this->hasMany(Son::class);
    }

    public function progulyanka()
    {
        return $this->hasMany(Progulyanka::class);
    }

    public function zrostanya()
    {
        return $this->hasMany(Zrostanya::class);
    }

    public function chasGri()
    {
        return $this->hasMany(ChasGri::class);
    }

    public function pidguznik()
    {
        return $this->hasMany(Pidguznik::class);
    }

    public function zcidjuvanya()
    {
        return $this->hasMany(Zcidjuvanya::class);
    }

    public function godivanyaGrudy()
    {
        return $this->hasMany(GoduvanyaGrudy::class);
    }

    public function goduvanyaPlashechka()
    {
        return $this->hasMany(GoduvanyaPlashechka::class);
    }

    public function goduvanyaTverda()
    {
        return $this->hasMany(GoduvanyaTverda::class);
    }

    public function likyZdorovya()
    {
        return $this->hasMany(LikyZdorovya::class);
    }

    public function poshtovhs()
    {
        return $this->hasMany(Poshtovhs::class);
    }

    public function symptomesZdorovya()
    {
        return $this->hasMany(SymptomesZdorovya::class);
    }

    public function temperatureZdorovya()
    {
        return $this->hasMany(TemperatureZdorovya::class);
    }

}
