<?php
namespace App\Custom\Notification;

use App\Models\User;
use App\Notifications\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNotification
{
    public function friendRequest(Request $request)
    {
        try {

            if ($request->has('nick') && $request->has('user_id') && $request->has('user_name')) {
                $recipient = User::query()->where('nick', $request['nick'])->first();
                if ($recipient->id != $request['user_id'] && $recipient->friends) {
                    //Generamos una notificación para el usuario al que le enviamos el mensaje
                    $recipient->notify(new FriendRequest($request['user_name']));
                    return true;
                }
            }
            return false;

        } catch (Exception $e) {
            return null;
        }
    }

    public function removeNotification(Request $request)
    {
        try {
            if ($request->has('id')) {
                $noti = Auth::user()->Notifications->find($request->input('id'));
                $noti->delete();
                return true;
            }
            return false;

        } catch (Exception $e) {

            return null;
         }
    }
}
