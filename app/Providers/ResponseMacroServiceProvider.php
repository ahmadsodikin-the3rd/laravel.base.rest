<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
	/**
	 * Register the application's response macros.
	 *
	 * @return void
	 */
	public function boot()
	{
		Response::macro('jsonFail', function ($errors, $errorCode=200) {
			return Response::make( json_encode(['errors'=>$errors]), $errorCode, ['content-type'=>'application/json']);
		});
		
		Response::macro('jsonFailAbort', function ($errors, $errorCode=200) {
			abort($errorCode, json_encode(['errors'=>$errors]), $headers);
		});
		
		Response::macro('jsonSuccess', function ($data=null) {
			return Response::make(json_encode(['success'=>true, 'data'=>$data]), 200, ['content-type'=>'application/json']);
		});
	}
}