<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Grade extends Model
{		
	use SoftDeletes;

    protected $fillable = [
    	'name',
    	'start_time',
    	'finish_time',
    	'professor_id'
    ];
    protected $dates = ['deleted_at'];

    public function professor()
    {
    	return $this->belongsTo('App\User','professor_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
