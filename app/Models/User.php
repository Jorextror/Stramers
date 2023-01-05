<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
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
        'nick',
        'superadmin',
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
        return $this->hasMany(Deck::class, 'user_id');
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }

    public function friends()
    {
        return $this->belongsToMany(User::class,'user_user','user_id_slave','user_id_master');
    }

    /**
    * @return money devuelve el dinero del usuario
    */
    public function get_money()
    {
        try {
            return $this->money;
        } catch (Exception $e) {
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
        } catch (Exception $e) {
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

    /**
     * Añade las cartas pasadas por parámetro al usuario pasado por parámetro
     * @param Request: <Array> id_cartas , id_user
     * @return Boolean
     */
    public static function AddCard(Request $request)
    {
        try {
            if ($request->has('data')) {
                $data = $request->all();
                $tarjetas_nuevas = $data['data'];
                $user = User::query()->where('id',$data['user'])->first();
                // Añade todas las tarjetas nuevas al usuario de una sola vez
                $user->cards()->attach($tarjetas_nuevas);
                return ['status'=>200, 'value'=>true];
                // return ['status'=>200, 'value'=>$tarjetas_nuevas];
            }
            return null;
        } catch (Exception $e) {
            return ['status'=>500, 'value'=>$e->getMessage()];
        }
    }

    /**
     * Agrega como amigo a un usuario pasado por parámetro
     * @param Int Id del usuario a agregar
     * @return Boolean
     */
    public static function AddFriend($id)
    {
        try {
            if (is_int($id) && $id>0) {
                $user_master = User::where('id',$id)->first();
                $user_slave = Auth::user();
                $user_slave->friends()->attach($user_master->id);
                $user_master->friends()->attach($user_slave->id);

                return true;
            }
            return null;
        } catch (Exception $e) {
            // return ['status'=>500, 'value'=>$e->getMessage()];
            return false;
        }
    }
}
