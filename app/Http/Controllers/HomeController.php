<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Contact;

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
            abort(404, 'we don\'t recognize "' . $username . '" as a username, the user you\'re looking for might have change it! "yes we support that, kid\'s play"');
        }
        $messages = $user->messages()->where('published', '1')->orderBy('created_at', 'DESC')->paginate(10);
        return view('home.profile')->with('user', $user)->with('messages', $messages);
    }

    public function contact(){
        return view('home.contact');
    }

    public function postContact(Request $request){
        $this->validate($request, [
            'email' => 'email',
            'message' => 'required'
        ]);
        //Should be improved! instead of sending to a specific address, take from user database users with a fitting role
        $user = \App\User::find(1);
        Notification::send($user, new Contact($request));
        return redirect()->back()->with('success', 'We got your message, you have our thanks for contacting us!');
    }
}
