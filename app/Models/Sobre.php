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
            switch ($sobre) {
                case 'normal':
                    Auth::user()->set_money($dinero-800);
                    $cartas = Card::where('obtainable',true)
                    ->where('category','comun')
                    ->orwhere('category','pocoComun')
                    ->inRandomOrder()
                    ->limit(5)
                    ->get()
                    ->toArray();
                    break;

                case 'supersobre':
                    Auth::user()->set_money($dinero-1500);
                    $cartas = Card::where('obtainable',true)
                    ->where('category','comun')
                    ->orwhere('category','pocoComun')
                    ->orwhere('category','epica')
                    ->inRandomOrder()
                    ->limit(5)
                    ->get()
                    ->toArray();
                    break;

                case 'megasobre':
                    Auth::user()->set_money($dinero-3000);
                    $cartas = Card::where('obtainable',true)
                    ->where('category','pocoComun')
                    ->orwhere('category','epica')
                    ->orwhere('category','legendaria')
                    ->inRandomOrder()
                    ->limit(5)
                    ->get()
                    ->toArray();
                    break;
                default:
                    return ['status'=>404, 'value'=>'Error, sobre no encontrado'];
            }

            $id = array_map(function($carta){
                return $carta['id'];
            },$cartas);

            return ['status'=>200, 'value'=>['id'=>$id,'cards'=>$cartas]];
        } catch (Exception $e) {
            return ["status"=>500,"value"=>$e];

        }
    }
}
