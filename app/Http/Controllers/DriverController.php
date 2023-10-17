<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function show(Request $request)
    {
        //return back the user and associated driver model
        $user = $request->user();
        $user->load('driver');
        return $user
    }
    public function update(Request $request) 
    {
        $request->validate([
            'year' => 'required|numerical|between:2010,2024',
            'make' => 'required',
            'model' => 'required',
            'color' => 'required|alpha',
            'license_plate' => 'required',
            'name' => 'required'
        ])
    }
}
