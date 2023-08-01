<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function topup(Request $request) {
        $user = User::find($request->userID);

        $user->wallet = $user->wallet + 100;
        $user->update();

        return back();
    }

    public function payment(Request $request) {
        $user = User::find($request->userID);
        $minus = 0;
        if($request->rest != 0){
            $user->wallet = $request->rest;
            $user->minus = 0;
            $user->save();

            return redirect('home');
        }else{
            if ($user->wallet < $request->payAmount) {
                return back()->with('notifE', 'Not enough coins!');

            }elseif ($request->payAmount < $user->registPrice) {
                $minus = $user->registPrice - $request->payAmount;
                return back()->with('notifE', 'You are still underpaid ' . $minus . ' coins');

            }elseif ($request->payAmount == $user->registPrice) {
                $user->wallet = $user->wallet - $user->registPrice;
                $user->save();

                return view('home');

            }else {
                $minus = $request->payAmount - $user->registPrice;

                $user->minus = $minus;
                $user->save();
                return back()->with('notifF', 'Sorry you overpaid ' . $minus . ' would you like to store the rest?');
            }
        }

    }

}
