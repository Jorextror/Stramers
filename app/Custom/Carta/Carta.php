<?php
namespace App\Custom\Carta;

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

}

?>
