<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Libraries\Client;

class TaskController extends Controller
{
	
	public function index(Request $request)
	{
		$rest = new Client('/task','GET',[],['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			return view('task.index')->withErrors($rest->getErrorsMessageBag());
		
		return view('task.index', ['data' => $rest->data]);
	}	
	
	public function show(Request $request, $id)
	{
		$rest = new Client('/task/'.$id, 'GET', [], ['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			return view('task.show')->withErrors($rest->getErrorsMessageBag());
		
		return view('task.show', ['data' => $rest->data]);
	}	
	
	public function create(Request $request)
	{
		return view('task.create');
	}	

	public function store(Request $request)
	{
		$rest = new Client('/task', 'POST', $request->all(), ['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			throw ValidationException::withMessages($rest->getErrors());
		
		return redirect()->route('task.index');
	}	
	
	public function edit(Request $request, $id)
	{
		$rest = new Client('/task/'.$id, 'GET', [], ['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			return view('task.edit')->withErrors($rest->getErrorsMessageBag());
		
		return view('task.edit', ['data' => $rest->data]);
	}	

	public function update(Request $request, $id)
	{
		$rest = new Client('/task/'.$id, 'PUT', $request->all(), ['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			throw ValidationException::withMessages($rest->getErrors());
		
		return redirect()->route('task.index');
	}	
	
	public function destroy(Request $request, $id)
	{
		$rest = new Client('/task/'.$id, 'DELETE', [], ['Token'=>session('api_token')]);
		
		if($rest->hasError()) 
			throw ValidationException::withMessages($rest->getErrors());
		
		return redirect()->route('task.index');
	}	
	
	
}
