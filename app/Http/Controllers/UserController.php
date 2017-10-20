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

    public function settings($username){
        if($username !== Auth::user()->username){
            return redirect()->route('home');
        }
        $user = User::where('username', $username)->first();
        return view('user.settings')->with('user', $user);
    }

    public function postSettings(Request $request){
        $user_id = $request->input('user_id');

        $this->validate($request, [
            'username' => 'required|string|min:2|max:15|unique:users,username,' . $user_id ,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user_id,
            'avatar' => 'max:10240'
        ]);

        $user = \App\User::find($user_id);

        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->bio = $request->input('bio');
        $user->email = $request->input('email');
        $user->mail_notify = empty($request->input('mail_notify'))? '0' : '1';
        $user->auto_publish = empty($request->input('auto_publish'))? '0' : '1';

        if($request->input('avatar-change') == 1){
            if($request->hasFile('avatar')){
                $image = $request->file('avatar');
                $imageName = 'avatar_' . $user_id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('image/users'), $imageName);
                $user->avatar = $imageName;
            }
        }
        
        $user->save();

        return redirect()->route('user.settings', ['username' => $user->username])->with('success', 'Your profile has been updated');
    }
}
