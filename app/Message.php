<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	public $timestamps = true;
	
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public static function generateCode(){
        $code = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
                    'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's', 't',
                    'u', 'v', 'w', 'x','y', 'z', 
                    '2', '3', '4', '5', '6', '7'];
        $result = '';
        for($i = 0; $i < 6; $i++){
            $rand = rand(0, 31);
            $result = $result . $code[$rand];
        }
        return $result;
    }
}
