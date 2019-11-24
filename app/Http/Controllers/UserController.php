<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Libraries\Client;

class UserController extends Controller
{
	
	public function index(Request $request)
	{
		$rest = new Client('/user','GET',[],['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			return view('user.index')->withErrors($rest->getErrorsMessageBag());
		
		return view('user.index', ['data' => $rest->data]);
	}	
	
	public function show(Request $request, $id)
	{
		$rest = new Client('/user/'.$id, 'GET', [], ['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			return view('user.show')->withErrors($rest->getErrorsMessageBag());
		
		return view('user.show', ['data' => $rest->data]);
	}	
	
	public function create(Request $request)
	{
		return view('user.create');
	}	

	public function store(Request $request)
	{
		$rest = new Client('/user', 'POST', $request->all(), ['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			throw ValidationException::withMessages($rest->getErrors());
		
		return redirect()->route('user.index');
	}	
	
	public function edit(Request $request, $id)
	{
		$rest = new Client('/user/'.$id, 'GET', [], ['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			return view('user.edit')->withErrors($rest->getErrorsMessageBag());
		
		return view('user.edit', ['data' => $rest->data]);
	}	

	public function update(Request $request, $id)
	{
		$rest = new Client('/user/'.$id, 'PUT', $request->all(), ['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			throw ValidationException::withMessages($rest->getErrors());
		
		return redirect()->route('user.index');
	}	
	
	public function destroy(Request $request, $id)
	{
		$rest = new Client('/user/'.$id, 'DELETE', [], ['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			throw ValidationException::withMessages($rest->getErrors());
		
		return redirect()->route('user.index');
	}	
	
	
}
