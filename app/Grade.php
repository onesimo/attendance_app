<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
}
