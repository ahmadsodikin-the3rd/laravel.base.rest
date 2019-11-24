<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

use App\Libraries\Client;
use App\User;


class AuthController extends Controller
{
	
	public function loginView(Request $request)
	{
		return view('auth.login');
	}	
	
	public function loginSubmit(Request $request)
	{
		$rest = new Client('/auth/login', 'POST', $request->all());
		
		if($rest->hasError()) 
			throw ValidationException::withMessages($rest->getErrors());
		
		
		if(!isset($rest->data->token) || !$rest->data->token)
			throw ValidationException::withMessages(['login'=>'Login failed']);
		
		session(['api_token' => $rest->data->token]);
		$rest = new Client('/auth/credential', 'GET', ['token' => $rest->data->token]);
		if($rest->hasError()) 
			throw ValidationException::withMessages($rest->getErrors());
		
		Auth::loginUsingId($rest->data->id);
		
		return redirect()->route('home');
	}	
	
	public function logout(Request $request)
	{
		$rest = new Client('/auth/logout','POST',[],['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			throw ValidationException::withMessages($rest->getErrors());

		Auth::logout();
		return redirect()->route('login');
	}	
	
	
	public function registerView(Request $request)
	{
		return view('auth.register');
	}	
	
	public function registerSubmit(Request $request)
	{
		$rest = new Client('/auth/register', 'POST', $request->all());
		
		if($rest->hasError()) 
			throw ValidationException::withMessages($rest->getErrors());
		
		return redirect()->route('login');
	}	
	
	
	
}
