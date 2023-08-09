<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'first_name',
        'last_name',
        'username',
        'phone',
        'dob',
        'email',
        'password',
        'msg_ribbon',
        'country',
        'country_id',
        'driver_id',
        'team_id',
        'race_id'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function car_number()
    {
        return $this->belongsTo(CarNumber::class, 'car_number_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function getName()
    {
        return $this->first_name . ' ' .$this->last_name;
    }
    
    public function reports()
    {
        return $this->hasMany(UserReport::class, 'reported_to', 'id');
    }

}
