<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function submit(Request $request)
    {
        // validate the phone number 
        $request->validate([
            'phone' => 'required|numeric|min:10'
        ]);
    }
}
