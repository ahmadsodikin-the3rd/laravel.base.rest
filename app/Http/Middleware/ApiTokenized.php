<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

use App\User;

class ApiTokenized
{
	
	public function handle($request, Closure $next)
	{
		$token = $request->header('Token');
		if(!$token) return response()->jsonFail('Unauthenticated');
		
		$user = User::where('api_token', $token)->first();
		if(!$user) return response()->jsonFail('Invalid token');
		
		Auth::login($user);
		return $next($request);
	}
}
