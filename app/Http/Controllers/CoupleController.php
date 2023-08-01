<?php

namespace App\Http\Controllers;

use App\Models\Couple;
use App\Models\User;
use Illuminate\Http\Request;

class CoupleController extends Controller
{
    //
    public function reqMatch(Request $request) {
        $match = User::find($request->match);
        $mine = User::find(Auth()->user()->id);

        if($mine->wallet >= 5){
            $mine->wallet = $mine->wallet - 5;
        }
        else{
            return back()->with('notifE', 'Not enough coins!');
        }

        if ($mine->gender == 'Female') {
            $manID = $match->id;
            $femaleID = $mine->id;
            $photoM = $match->photo;
            $photoF = $mine->photo;
        }
        else {
            $manID = $mine->id;
            $femaleID = $match->id;
            $photoM = $mine->photo;
            $photoF = $match->photo;
        }

        $mine->state_id = '2';

        $mine->update();

        Couple::create([
            'state_id' => '2',
            'manID' => $manID,
            'womanID' => $femaleID,
            'manPhoto' => $photoM,
            'womanPhoto' => $photoF,
            'requester' => $mine->id
        ]);

        return back();
    }

    public function accMatch(Request $request) {
        $match = User::find($request->match);
        $mine = User::find(Auth()->user()->id);

        if ($mine->gender == 'Female') {
            $manID = $match->id;
            $femaleID = $mine->id;
        }
        else {
            $manID = $mine->id;
            $femaleID = $match->id;
        }

        $pacar = Couple::where('manID', $manID)->where('womanID', $femaleID)->first();


        $mine->state_id = '3';
        $mine->wallet = $mine->wallet - 5;

        $match->state_id = '3';
        $pacar->state_id = '3';

        $mine->update();
        $match->update();
        $pacar->update();


        return back();
    }
}
