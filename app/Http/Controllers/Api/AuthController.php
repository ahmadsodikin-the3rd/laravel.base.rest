<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;

use App\User;

class AuthController extends Controller
{
	
	public function login(Request $request)
	{
		$credentials = $request->only('username', 'password');
		
		if (Auth::attempt($credentials)) 
		{
			$token = hash('sha256', Str::random(80));
			$request->user()->forceFill(['api_token' => $token])->save();
			return response()->jsonSuccess(['token' => $token]);
		} 
		else return response()->jsonFail('Invalid username or password');
	}
	
	public function logout(Request $request)
	{
		$request->user()->forceFill(['api_token' => null])->save();
		Auth::logout();
		return response()->jsonSuccess();		
	}
	
	public function credential(Request $request)
	{
		$user = User::where('api_token',$request->input('token'))->first();
		if(!$user) 
			return response()->jsonFail('Invalid token');
		else
			return response()->jsonSuccess($user->toArray());
	}
	
	public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'username' => 'required|unique:users,username',
			'name' => 'required',
			'email' => 'required',
			'password' => 'required|min:4',
			'confirm_password' => 'required|min:4|same:password',
			'add_geo_lat' => 'nullable|numeric',
			'add_geo_lng' => 'nullable|numeric',			
    ]);
		
		if ($validator->fails()) 
			return response()->jsonFail($validator->errors()->all());
		
		$user = new User;
		foreach($user->getFillable() as $field) if($request->has($field))
		{
			$value = $request->input($field);
			if($field == 'password') $value = Hash::make($value);
			$user->$field = $value;
		}
		$user->save();
		
		return response()->jsonSuccess($user);
	}	
	
	
	
	
}
