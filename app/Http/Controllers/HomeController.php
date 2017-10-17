<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('home.index');
    }

    public function redirect()
    {
        if(Auth::check()){
            return redirect()->route('user.index', ['username' => Auth::user()->username]);
        }

        return redirect()->route('home');
    }

    public function profile($username){
        $user = User::where('username', $username)->first();
        if(!$user){
            return "No User!";
        }
        $messages = $user->messages()->where('published', '1')->orderBy('created_at', 'DESC')->paginate(10);
        return view('home.profile')->with('user', $user)->with('messages', $messages);
    }
}
