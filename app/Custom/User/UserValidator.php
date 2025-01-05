<?php
namespace App\Custom\User;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserValidator
{

    public static function validateUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2|max:15',
                'nick' => 'required|min:2|max:15',
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
