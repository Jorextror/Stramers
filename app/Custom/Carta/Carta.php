<?php
namespace App\Custom\Carta;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Carta
{

    public function validateCard(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2|max:255|unique:cards,name',
                'category' => 'required',
                'type' => 'required',
                'dmg' => 'required|integer|min:0|max:30',
                'life'=>'required|integer|min:0|max:30',
                'text' => 'max:255',
                'cost'=> 'required|integer|min:0|max:30',
                'obtainable' => 'required',
                'img' => 'required',
            ]);
            if ($validator->fails()) {
                //Error 406 = no aceptable
                return ["status"=>406, "value"=>$validator];
            }

            return ["status"=>200, "value"=>$request];

        } catch (Exception $e) {
            return ["status"=>500,"value"=>$e];

        }
    }

    public function validateUpdatedCard(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2|max:255',
                'category' => 'required',
                'type' => 'required',
                'dmg' => 'required|integer|min:0|max:30',
                'life'=>'required|integer|min:0|max:30',
                'text' => 'max:255',
                'cost'=> 'required|integer|min:0|max:30',
                'obtainable' => 'required',
            ]);
            if ($validator->fails()) {
                //Error 406 = no aceptable
                return ["status"=>406, "value"=>$validator];
            }

            return ["status"=>200, "value"=>$request];

        } catch (Exception $e) {
            return ["status"=>500,"value"=>$e];

        }
    }

    public static function genera_sobre(Request $request)
    {
        try {
            $cartas = [];
            $sobre = $request->all()['data'];
            switch ($sobre) {
                case 'normal':
                    $cartas = Card::where('obtainable',true)
                    ->where('category','comun')
                    ->orwhere('category','pocoComun')
                    ->inRandomOrder()
                    ->limit(5)
                    ->get()
                    ->toArray();

                    break;

                case 'supersobre':
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

?>
