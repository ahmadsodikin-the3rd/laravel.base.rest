<?php

namespace App\Libraries;

use Illuminate\Support\MessageBag;

class Client{
	
	protected $baseUrl = false;
	protected $allowedMehod = ['GET','POST','PUT','DELETE'];
	
	protected $errors = [];
	
	protected $resultHeader = null;
	protected $resultRaw = null;
	
	public $url;
	public $method;
	public $result;
	public $data = null;
	
	
	function __construct($url=false, $method='GET', $params=[], $headers=[])
	{
		if(!$this->baseUrl) $this->baseUrl = url('api');
		if($url) $this->request($url, $method, $params, $headers);
	}

	public function request($url, $method='GET', $params=array(), $headers=[])
	{
		if(!stristr($url,'://')) $url = $this->baseUrl.$url;
		
		$method = strtoupper($method);
		if(!in_array($method, $this->allowedMehod)) return $this->setErrors('connection', 'Invalid method');
		
		if($method == 'GET') $url = $url . '?' . http_build_query($params);

		$this->url = $url;
		$this->method = $method;
		
		$conn = curl_init();
		$args = array(
			CURLOPT_URL => $this->url,
			CURLOPT_HEADER => true,
			CURLOPT_BINARYTRANSFER => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 5,
			//CURLOPT_VERBOSE => 1,
			//CURLOPT_STDERR => fopen(dirname(__FILE__).'/errorlog.txt', 'w'),
			CURLOPT_FOLLOWLOCATION => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
		);
		if($method == 'POST') 
		{
			$args[CURLOPT_POST] = true;
			$args[CURLOPT_POSTFIELDS] = json_encode($params);
			$args[CURLOPT_HTTPHEADER] = ['Content-type: application/json'];
		}		
		if(!in_array($method, ['POST','GET'])) 
		{
			$args[CURLOPT_CUSTOMREQUEST] = $method;
		}
		if($method == 'PUT') 
		{
			$args[CURLOPT_POSTFIELDS] = json_encode($params);
			$args[CURLOPT_HTTPHEADER] = ['Content-type: application/json'];
		}
		$port = parse_url($this->url, PHP_URL_PORT);
		if($port)
		{
			$args[CURLOPT_PORT] = $port;
		}
		
		
		if($headers && is_array($headers))
		{
			foreach($headers as $key=>$val) $args[CURLOPT_HTTPHEADER][] = $key.': '.$val;
		}

		curl_setopt_array($conn, $args);
		$result = curl_exec($conn);
		
		$this->resultHeader = array();
		$error = curl_error($conn);
		$url = curl_getinfo($conn, CURLINFO_EFFECTIVE_URL );
		$http_code = curl_getinfo($conn, CURLINFO_HTTP_CODE);
		$header_size = curl_getinfo($conn, CURLINFO_HEADER_SIZE);
		curl_close($conn);
		
		if($error) 
			return $this->setErrors('connection', 'Connection to url failed, Error: '.$error);
		
		$header = trim(substr($result, 0, $header_size));
		$this->resultRaw = substr($result, $header_size);
		$arr = explode("\n", $header);
		foreach($arr as $i=>$val) if($val)
		{
			$v_arr = explode(':', $val, 2);
			if($i==0)
			{
				$v_arr = explode(' ', $val);
				$v_arr = ['req-status', $v_arr[1]];
			}
			$this->resultHeader[strtolower(trim($v_arr[0]))] = isset($v_arr[1]) ? trim($v_arr[1]) : false;
		}

		if(!stristr($this->resultHeader['content-type'], 'application/json')) 
			return $this->setErrors('connection', 'Invalid JSON response');
		

		$this->result = json_decode($this->resultRaw);
		if(!$this->result)
			return $this->setErrors('connection', 'Invalid JSON response');
		
		if(isset($this->result->errors) && $this->result->errors) 
			return $this->setErrors($this->result->errors);
		
		if(isset($this->result->error) && $this->result->error) 
			return $this->setErrors($this->result->error);
		
		if(isset($this->result->data)) 
			$this->data = $this->result->data;
		
		return $this;
	}

	public function hasError()
	{
		return $this->errors ? true : false;
	}
	
	public function getErrors()
	{
		return $this->hasError() ? $this->errors : [];
	}
	
	public function getErrorsMessageBag()
	{
		if ($this->hasError())
		{
			$bag = new MessageBag();
			foreach($this->errors as $key=>$val) $bag->add($key, $val);
			return $bag;
		}
		return false;
	}
	
	public function getResultHeader()
	{
		return $this->resultHeader;
	}
	
	public function getResult()
	{
		return $this->result;
	}
	
	public function getResultRaw()
	{
		return $this->resultRaw;
	}
	

	protected function setErrors($errors, $message=false)
	{
		if(is_array($errors)) 
			$this->errors = array_merge($this->errors, $errors);
		else if($message)
			$this->errors[$errors] = $message;
		else 
			$this->errors[] = $errors;
		return false;
	}
}
