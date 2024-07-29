<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use App\Models\user;
use App\Models\Order;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $plans = Plan::all();
       if(Auth::user()->role == 'user'){
            return view('welcome',compact('plans'));
       }
        return view('home',compact('plans'));
    }


    public function userList()
    {
        $users = User::where('role','user')->get();
        return view('user.index', compact('users'));
    }

    public function userdata()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('user.show', compact('user'));
    }

    public function transaction(){
        
        if (Auth::user()->role == 'user') {
            $transactions = Order::where('userid', Auth::user()->id)->get();
            return view('user.transactions', compact('transactions'));
        } else {
            $transactions = Order::all();
            return view('transactions.index', compact('transactions'));
        }
    }
}
