<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(Request $request){
    	$this->validate($request, [
    		'content' => 'required|min:1|max:300'
    	]);

    	$message = new \App\Message();
    	$message->content = $request->input('content');
    	$message->user_id = $request->input('user_id');
    	
    	if(!empty($request->input('visibility'))){
    		$message->visibility = 'private';
    	}

    	$message->save();
    	return redirect()->back()->with('success', 'The message has been delivered');
    }
}
