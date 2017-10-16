<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
       return $this->profile('abdullahalt');
    }

    public function profile($username){
        $user = User::where('username', $username)->first();
        $messages = $user->messages()->where('published', '1')->orderBy('created_at', 'DESC')->paginate(10);
        return view('home.index')->with('user', $user)->with('messages', $messages);
    }
}
