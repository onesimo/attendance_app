<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
        
    protected $dates = [
        'start_date',
        'finish_date'
    ];

    public function setStartDateAttribute($date)
    {
        $this->attributes['start_date'] = date("Y-m-d",strtotime($date));
    }

    public function getStartDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function setFinishDateAttribute($date)
    {
        $this->attributes['start_date'] = date("Y-m-d",strtotime($date));
    }

    public function getFinishDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type_id','start_date','finish_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function professor()
    {
        return $this->hasMany('App\Grade','professor_id');
    }

    public function grades()
    {
        return $this->belongsToMany('App\Grade','grade_user')->withPivot('deleted_at', 'created_at','updated_at');
;
    }

    public function attendances()
    {
        return $this->belongsToMany('App\Grade','attendances');
;
    }

 
}
