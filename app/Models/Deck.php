<?php

namespace App\Models;
use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Deck extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'decks';
    protected $fillable = [
        'user_id',
        'name',
        'cards',
        'selected'
    ];

    /**
     * Relaciones
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }


    /**
     * @param deck_id ID de la carta a buscar
     *
     * @return Object devuelve la carta especificada por id
     */
    public function get_deck_by_id($deck_id)
    {
        try {
            $deck = Deck::query()
               ->where('id',$deck_id)
               ->get();
            if (! empty($card)) {
                return ['status'=> 200, 'value'=>$deck];
            }else{
                return ['status'=> 404, 'value'=>null];
            }
        } catch (Error $e) {
            return ['status'=>500,'value'=>$e];
        }
    }

     /**
     * @param deck_name Name del mazo a buscar
     *
     * @return Object devuelve la carta especificada por id
     */
    public function get_deck_by_name($deck_name)
    {
        try {
            $deck = Deck::query()
               ->where('id',$deck_name)
               ->get();

            if (! empty($card)) {
                return ['status'=> 200, 'value'=>$deck];
            }else{
                return ['status'=> 404, 'value'=>null];
            }
        } catch (Error $e) {
            return ['status'=>500,'value'=>$e];
        }
    }

    public static function create(Request $request)
    {
        try {

            $deck = new Deck();
            $deck->name = $request->input('name');
            $deck->selected = false;
            $deck->usos = 0;
            $deck->user_id =$request->input('user_id');
            $deck->save();
            $deck->cards()->attach($request->input('cards'));

            return true;

        } catch (Error $e) {
           return null;
        }
    }
}
