<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index($username){
    	$user = User::where('username', $username)->first();
        $messages = $user->messages()->orderBy('created_at', 'DESC')->paginate(5);
        return view('user.index')->with('user', $user)->with('messages', $messages);
    }
}
