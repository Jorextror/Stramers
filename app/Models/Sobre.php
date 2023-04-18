<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Sobre extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'sobres';

    protected $fillable = [
        'name',
        'type',
        'cost',
    ];

    public static function genera_sobre(Request $request)
    {
        try {
            $cartas = [];
            $sobre = $request['data'];
            $dinero = Auth::user()->money;

            $tipoSobre = Sobre::query()->where('name',$sobre)->first();
            $tipoCartas = explode(',',$tipoSobre->type);
            Auth::user()->set_money($dinero-$tipoSobre->cost);
            $cartas = Card::where('obtainable',false)
                                ->whereIn('category',$tipoCartas)
                                ->inRandomOrder()
                                ->limit(5)
                                ->get()
                                ->toArray();

            $id = array_map(function($carta){
                return $carta['id'];
            },$cartas);

            return ['status'=>200, 'value'=>['id'=>$id,'cards'=>$cartas]];
        } catch (Exception $e) {
            return ["status"=>500,"value"=>$e];
        }
    }
}
