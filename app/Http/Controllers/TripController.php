<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'origin' => 'required',
            'destination' => 'required',
            'destination_name' => 'required',
        ]);
        return $request->user()->trips()->create($request->only([
            'origin',
            'destination',
            'destination_name'
        ]));
    }

    public function show(Request $request, Trip $trip)
    {
        // is the trip associated with the authenticated user?
        if ($trip->user->id === $request->user()->id) {
            return $trip;
        }
        return $trip;
    }
}
