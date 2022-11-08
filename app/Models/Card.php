<?php

namespace App\Models;

use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    protected $table = 'cards';
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'category',
        'type',
        'cost',
        'dmg',
        'life',
    ];
    /**
     * Relaciones
     */

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function deck()
    {
        return $this->belongsToMany(Deck::class);
    }

    /**
     * @return Array devuelve todas las cartas
     */
    public function get_all()
    {
        try {
            return['status'=>200,'value'=> Card::query()
            ->with('name')
            ->get()
            ];

            } catch (Error $e) {
                return ['status'=>500,'value'=>$e];
            }

    }

    /**
     * @param card_id ID de la carta a buscar
     *
     * @return Object devuelve la carta especificada por id
     */
    public function get_card_by_id($card_id)
    {
        try {
            $card = Card::query()
               ->where('id',$card_id)
               ->get();

            if (! empty($card)) {
                return ['status'=> 200, 'value'=>$card];
            }else{
                return ['status'=> 404, 'value'=>null];
            }
        } catch (Error $e) {
            return ['status'=>500,'value'=>$e];
        }
    }

    /**
     * @param card_name ID de la carta a buscar
     *
     * @return Object devuelve la carta especificada por id
     */
    public function get_card_by_name($card_name)
    {
        try {
            $card = Card::query()
               ->where('name',$card_name)
               ->get();

            if (! empty($card)) {
                return ['status'=> 200, 'value'=>$card];
            }else{
                return ['status'=> 404, 'value'=>null];
            }
        } catch (Error $e) {
            return ['status'=>500,'value'=>$e];
        }
    }
    //TODO añadir más maneras de buscar cartas
}
