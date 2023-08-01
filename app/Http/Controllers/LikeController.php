<?php

namespace App\Http\Controllers;

use App\Models\Couple;
use App\Models\Job;
use App\Models\JobUser;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class LikeController extends Controller
{
    //
    public function like() {
        $males = User::where('gender', 'Male')->whereIn('state_id', ['1', '2'])->get();
        $females = User::where('gender', 'Female')->whereIn('state_id', ['1', '2'])->get();

        // $couplesF = Couple::where('manID', Auth()->user()->id)->where('requester', '!=', Auth()->user()->id)->paginate(3);
        // $couplesM = Couple::where('womanID', Auth()->user()->id)->where('requester', '!=', Auth()->user()->id)->paginate(3);
        $couplesF = Couple::where('manID', Auth()->user()->id)->where('requester', '!=', Auth()->user()->id)
                  ->whereIn('manID', function ($query) {
                      $query->select('id')
                            ->from('users')
                            ->where('state_id', '=', 1)
                            ->orWhere('state_id', '=', 2);
                  })->paginate(3);

        $couplesM = Couple::where('womanID', Auth()->user()->id)->where('requester', '!=', Auth()->user()->id)
                  ->whereIn('manID', function ($query) {
                      $query->select('id')
                            ->from('users')
                            ->where('state_id', '=', 1)
                            ->orWhere('state_id', '=', 2);
                  })->paginate(3);

        $couplesMF = Couple::where('manID', Auth()->user()->id)->where('state_id', '3')->paginate(3);
        $couplesMM = Couple::where('womanID', Auth()->user()->id)->where('state_id', '3')->paginate(3);

        $matchedM = User::where('gender', 'Male')->where('state_id', '3')->get();
        $matchedF = User::where('gender', 'Female')->where('state_id', '3')->get();

        $requestedF = Couple::where('manID', Auth()->user()->id)->where('requester', Auth()->user()->id)->whereIn('state_id', ['1', '2'])->paginate(3);
        $requestedM = Couple::where('womanID', Auth()->user()->id)->where('requester', Auth()->user()->id)->whereIn('state_id', ['1', '2'])->paginate(3);

        $jobs = Job::all();
        $userJobs = JobUser::all();


        return view('like', compact('males', 'females', 'couplesF', 'couplesM', 'couplesMF', 'couplesMM', 'matchedM', 'matchedF', 'requestedM', 'requestedF', 'jobs', 'userJobs'));
    }
}
