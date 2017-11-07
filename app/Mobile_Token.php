<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile_Token extends Model
{
	protected $table ="mobile__tokens";

	public static function check($request, $user_id){
	// 0 that mean that user not exist
	if (sizeof(Mobile_Token::where('user_id', $user_id)->where('token', $request->mobile_token)->first()) == 0) {
	$mobile = new Mobile_Token;
	$mobile->mobile_type = $request->mobile_type;
	$mobile->token = $request->mobile_token;
	$mobile->user_id = $user_id;
	$mobile->save();
	}
	}
}
