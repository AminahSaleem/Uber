<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\LoginNeedsVerification;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function submit(Request $request)
    {
        // validate the phone number 
        $request->validate([
            'phone' => 'required|numeric|min:10'
        ]);
        // find or create a user model 
        $user = User::firstOrCreate([
            'phone' => $request->phone
        ]);
        if (!$user) {
            return response()->json(['message' => 'Could not process a user with that phone number.'], 401);
        }
        // send the user a one time code 
        $user->notify(new LoginNeedsVerification());

        //return a response
        return response()->json(['message' => 'Text message notification sent.']);
    }
}
