<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $table = 'tasks';

	protected $fillable = [
		'name','start','due','end','description'
	];

	protected $hidden = [
		'created_at', 'updated_at'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
