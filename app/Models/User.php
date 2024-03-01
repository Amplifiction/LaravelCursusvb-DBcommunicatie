<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

//use Attribute; //Standaard, maar verwijderd omdat anders de method make not defined is.
    //Dus: deze commenten, onderaan Attribute importeren.
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ //Zie eloquent: mass assignment.
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

     //CASTS (automatisch toegevoegd)
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        //nieuwer dan de mutators. Doet hetzelfde als onderstaande mutator: elk wachtwoord wordt gehashed opgeslagen, en unhashed opgevraagd.
    ];

    //MUTATOR: automatisch hashen van password:
    protected function password(): Attribute {
        return Attribute::make( //Deze make was undefined vóór bovenstaande correcte import van de Attribute class.
            get: fn ($value) => $value,
            set: fn ($value) => Hash::make($value),
        );
    }

    //ACCESSOR: full name
    protected function fullName(): Attribute {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['name'].' '.$attributes['email']
            //even email gebruik omdat de usertabel geen surname voorziet zoals in cursus.
        );
    }

}

//de drie protected secties fillable, hidden en casts zitten standaard in elk Laravel project. (Usermodel standaard in elk Laravel project.)
