<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;

use App\User;
use App\Task;

class TaskController extends Controller
{
	
	public function index(Request $request)
	{
		return response()->jsonSuccess($request->user()->tasks->toArray());
	}
	
	public function show(Request $request, $id)
	{
		$model = $request->user()->tasks()->find($id);
		if(!$model) return response()->jsonFail('Data not found'); 
		else return response()->jsonSuccess($model);
	}
	
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'start' => 'nullable|date',
			'due' => 'nullable|date',
			'end' => 'nullable|date',
    ]);
		
		if ($validator->fails()) 
			return response()->jsonFail($validator->errors()->all());
		
		$model = new Task;
		foreach($model->getFillable() as $field) if($request->has($field))
		{
			$value = $request->input($field);
			$model->$field = $value;
		}
		$request->user()->tasks()->save($model);
		
		return response()->jsonSuccess($model);
	}	
	
	public function update(Request $request, $id)
	{
		$model = $request->user()->tasks()->find($id);
		if (!$model) 
			return response()->jsonFail('Data not found');
		
		$validator = Validator::make($request->all(), [
			'name' => 'nullable',
    ]);
		
		if ($validator->fails()) 
			return response()->jsonFail($validator->errors()->all());
		
		foreach($model->getFillable() as $field) if($request->has($field))
		{
			$value = $request->input($field);
			$model->$field = $value;
		}
		$model->save();
		
		return response()->jsonSuccess($model);
	}
	
	public function destroy(Request $request, $id)
	{
		$model = $request->user()->tasks()->find($id);
		if (!$model)  return response()->jsonFail('Data not found');
		
		$model->delete();		
		return response()->jsonSuccess($model);
	}
	
	
	
	
}
