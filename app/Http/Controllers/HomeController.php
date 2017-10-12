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
        //To eager load messages and order them, taken from: https://stackoverflow.com/a/18862651
        // $user = User::with(array('messages' => function($query){
        //     $query->orderBy('created_at','DESC');
        // }))->where('username', $username)->first();
        // return view('home.index')->with('user', $user);
        $user = User::where('username', $username)->first();
        $messages = $user->messages()->where('published', '1')->orderBy('created_at', 'DESC')->paginate(5);
        return view('home.index')->with('user', $user)->with('messages', $messages);
    }
}
