<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//TODO Crear funciónes para modificación de usuarios (Quitar dinero, añadir dinero, ¿Avatar?)

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'money',
        'card_id',
        'nick',
        'superadmin'
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

    /**
     * Relaciones
     */

    public function decks()
    {
        return $this->hasMany(Deck::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

     /**
     * @return money devuelve el dinero del usuario
     */
    public function get_money()
    {
        try {
            return $this->money;
        } catch (Error $e) {
            return ['status'=>500,'value'=>$e];
        }
    }

     /**
     * @return money devuelve el dinero del usuario
     */
    public function set_money($cantidad=0)
    {
        try {
            if (! is_int($cantidad)) return null;

            $this->money = $cantidad;
            $this->save();
        } catch (Error $e) {
            return ['status'=>500,'value'=>$e];
        }
    }

    /**
     * @return boolean devuelve si el usuario es super admin o no
     */
    public function is_sa()
    {
        return $this->superadmin;
    }

}
