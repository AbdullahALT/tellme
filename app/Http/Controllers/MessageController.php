<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\MessageNotification;
use App\Message;

class MessageController extends Controller
{
    public function create(Request $request){
    	$this->validate($request, [
    		'content' => 'required|max:300'
    	]);

        $user = \App\User::find($request->input('user_id'));
        $code = $this->getCode();

    	$message = new \App\Message();
    	$message->content = $request->input('content');
        $message->code = $code;
    	
        $append = '';
    	if(!empty($request->input('visibility'))){
    		$message->visibility = 'private';
            $append = '. your message code is ' . $code . ', use it to see if it has been commntted to';
    	}

        $user->messages()->save($message);
    	$message->save();
        $user->notify(new MessageNotification($message));
    	return redirect()->back()->with('success', 'The message has been delivered' . $append);
    }

    public function comment(Request $request){
        $this->validate($request, [
            'comment' => 'required|max:300'
        ]);

        $message = \App\Message::find($request->input('message-id'));
        $message->comment = $request->input('comment');
        $message->published = '1';
        $message->save();
        return redirect()->back();
    }

    public function delete($id){
        $message = \App\Message::find($id);
        $message->delete();
        return redirect()->back()->with('success', 'The message has been deleted');
    }

    private function getCode(){
        $flag = true;
        while($flag){

            $code = Message::generateCode();
            $message = Message::where('code', $code)->first();
            if(!$message){
                $flag = false;
            }
        }
        return $code;
    }

   
}
