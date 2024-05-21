<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'parent1_name',
        'parent1_surname',
        'parent2_name',
        'parent2_surname',
        'selected_children_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function children()
    {
        return $this->hasMany(Child::class);
    }

    public function selectedChildren()
    {
        return $this->hasOne(Child::class);
    }

    public function vagitnistVagas()
    {
        return $this->hasMany(VagitnistVaga::class);
    }

    public function poshtovhs()
    {
        return $this->hasMany(Poshtovhs::class);
    }

    public function chasgris()
    {
        return $this->hasMany(ChasGri::class);
    }

    public function temperatureZdorovyas()
    {
        return $this->hasMany(TemperatureZdorovya::class);
    }

    public function symptomesZdorovyas()
    {
        return $this->hasMany(SymptomesZdorovya::class);
    }

    public function progulyankas()
    {
        return $this->hasMany(Progulyanka::class);
    }

    public function likyZdorovya()
    {
        return $this->hasMany(LikyZdorovya::class);
    }

    public function son()
    {
        return $this->hasMany(Son::class);
    }

    public function zcidjuvanyas()
    {
        return $this->hasMany(Zcidjuvanya::class);
    }

    public function zrostanyas()
    {
        return $this->hasMany(Zrostanya::class);
    }

    public function pidguzniks()
    {
        return $this->hasMany(Pidguznik::class);
    }

    public function goduvanyaGrudy()
    {
        return $this->hasMany(GoduvanyaGrudy::class);
    }

    public function goduvanyaPlashechkas()
    {
        return $this->hasMany(GoduvanyaPlashechka::class);
    }

    public function goduvanyaTverdas()
    {
        return $this->hasMany(GoduvanyaTverda::class);
    }

    public function importantEvents()
    {
        return $this->hasMany(ImportantEvents::class);
    }

    public function calendarEvents()
    {
        return $this->hasMany(CalendarEvents::class);
    }

    public function settings()
    {
        return $this->hasMany(Settings::class);
    }
}
