<?php

namespace App\Http\Controllers;

use App\Models\Couple;
use App\Models\Job;
use App\Models\JobUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function home() {
        $users = User::whereIn('state_id', ['1', '2', '3'])->get();
        $males = User::where('gender', 'Male')->whereIn('state_id', ['1', '2', '3'])->get();
        $females = User::where('gender', 'Female')->whereIn('state_id', ['1', '2', '3'])->get();
        $jobs = Job::all();
        $userJobs = JobUser::all();

        $couplesF = null;
        $couplesM = null;

        if (Auth()->check()) {
            $couplesF = Couple::where('manID', Auth()->user()->id)->get();
            $couplesM = Couple::where('womanID', Auth()->user()->id)->get();
        }

        return view('home', compact('users', 'males', 'females', 'couplesF', 'couplesM', 'jobs', 'userJobs'));
    }

    public function index() {
        $jobs = Job::all();
        return view('register', compact('jobs'));
    }

    public function register(Request $request){
        $validate = $request->validate([
            'name' => 'required|min:2|max:25',
            'gender' => 'required',
            'age' => 'required|numeric|min:18',
            'photo' => 'required|image',
            'password' => 'required',
            'username' => 'required',
            'phone' => 'required|numeric|unique:users',
        ]);

        if ($request->file('photo')) {
            $validate['photo'] = $request->file('photo')->store('database-assets');
        }

        $validate['password'] = bcrypt($validate['password']);

        $validate['state_id'] = '1';

        $validate['username'] = 'https://www.linkedin.com/in/' . $validate['username'];

        $validate['registPrice'] = $request->registPrice;

        $user = User::create($validate);


        $request->validate([
            'selected_jobs' => 'required|array|min:3',
        ]);

        $jobs = $request->input('selected_jobs');

        foreach ($jobs as $job) {
            JobUser::create([
                'job_id' => $job,
                'user_id' => $user->id
            ]);
        }

        return redirect('/login');
    }

    public function masuk(Request $request) {
        $validate = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();

            return redirect()->intended('/home')->with('notifS', 'Successfully Logged In');
        }

        return back()->with('notifE', 'Login Failed!');
    }

    public function payment() {
        return view('payment');
    }

    public function overpaid() {
        return view('overpaid');
    }

    public function login() {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->intended('/home')->with('logoutSuccess', 'Successfully logged out');
    }
}
