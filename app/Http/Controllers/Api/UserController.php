<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
	
	public function index(Request $request)
	{
		return response()->jsonSuccess(User::get()->toArray());
	}
	
	public function show(Request $request, $id)
	{
		$model = User::find($id);
		if(!$model) return response()->jsonFail('Data not found'); 
		else return response()->jsonSuccess($model);
	}
	
	public function store(Request $request)
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
		
		$model = new User;
		foreach($model->getFillable() as $field) if($request->has($field))
		{
			$value = $request->input($field);
			if($field == 'password') $value = Hash::make($value);
			$model->$field = $value;
		}
		$model->save();
		
		return response()->jsonSuccess($model);
	}	
	
	public function update(Request $request, $id)
	{
		$model = User::find($id);
		if (!$model) 
			return response()->jsonFail('Data not found');
		
		$validator = Validator::make($request->all(), [
			'username' => 'nullable|unique:users,username,'.$id,
			'name' => 'nullable',
			'email' => 'nullable',
			'password' => 'nullable|min:4',
			'confirm_password' => 'nullable|min:4|same:password',
			'add_geo_lat' => 'nullable|numeric',
			'add_geo_lng' => 'nullable|numeric',

    ]);
		
		if ($validator->fails()) 
			return response()->jsonFail($validator->errors()->all());
		
		foreach($model->getFillable() as $field) if($request->has($field))
		{
			$value = $request->input($field);
			if($field == 'password')
			{
				if(!$value) continue;
				$value = Hash::make($value);
			}
			$model->$field = $value;
		}
		$model->save();
		
		return response()->jsonSuccess($model);
	}
	
	public function destroy(Request $request, $id)
	{
		$model = User::find($id);
		if (!$model)  return response()->jsonFail('Data not found');
		
		$model->delete();		
		return response()->jsonSuccess($model);
	}
	
	
	
	
}
