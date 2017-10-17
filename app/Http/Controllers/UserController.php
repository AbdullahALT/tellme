<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index($username){
    	if($username !== Auth::user()->username){
    		return redirect()->route('home');
    	}
    	$user = User::where('username', $username)->first();
        $published = $user->messages()->where('published', '1')->orderBy('updated_at', 'DESC')->get();
        $unpublished = $user->messages()->where('published', '0')->orderBy('created_at', 'DESC')->get();
        return view('user.index')->with('user', $user)->with('published', $published)->with('unpublished', $unpublished);
    }
}
