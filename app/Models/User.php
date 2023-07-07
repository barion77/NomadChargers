<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function addToFavourites($charger_id)
    {
        if ($this->favourites()->where('favourites.charger_id', $charger_id)->exists())
            return false;

        $favourite = new Favourite();
        $favourite->charger_id = $charger_id;
        $this->favourites()->save($favourite);

        return true;
    }

    public function removeFromFavourites($charger_id)
    {
        $favourite = $this->favourites()->where('charger_id', $charger_id)->first();
        $favourite->delete();
    }

}
