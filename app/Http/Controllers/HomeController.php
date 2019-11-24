<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
	
	public function index()
	{
		return view('home');
	}
	
	public function apiDocs()
	{
		$routes = [
			'Auth' => [
				'Login|post|/auth/login|username, password', 
				'Cek Credential|get|/auth/credential|token', 
				'Register|post|/auth/register|name, email, password, confirm_password, username, phone, website, addr_street, addr_suite, add_city, add_zip, add_geo_lat, add_geo_lng, cpn_name, cpn_phrase, cpn_bs', 
				'Logout|post|/auth/logout|-|Token: {login-token}', 
			], 
			'User' => [
				'List Users|get|/user|-|Token: {login-token}', 
				'Get Single User|get|/user/{id}|-|Token: {login-token}', 
				'Create User|post|/user|name, email, password, confirm_password, username, phone, website, addr_street, addr_suite, add_city, add_zip, add_geo_lat, add_geo_lng, cpn_name, cpn_phrase, cpn_bs|Token: {login-token}', 
				'Edit User|put|/user/{id}|name, email, password, confirm_password, username, phone, website, addr_street, addr_suite, add_city, add_zip, add_geo_lat, add_geo_lng, cpn_name, cpn_phrase, cpn_bs|Token: {login-token}', 
				'Delete User|delete|/user/{id}|-|Token: {login-token}', 
			], 
			'Task' => [
				'List Tasks|get|/task|-|Token: {login-token}', 
				'Get Single Task|get|/task/{id}|-|Token: {login-token}', 
				'Create Task|post|/task|name, start, due, end, description|Token: {login-token}', 
				'Edit Task|put|/task/{id}|name, start, due, end, description|Token: {login-token}', 
				'Delete Task|delete|/task/{id}|-|Token: {login-token}', 
			],
		];
		return view('docs.api',['routes'=>$routes]);
	}
	
}
