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
        'finish_date',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

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

    /*public function setStartDateAttribute($date)
    {
        $this->attributes['start_date'] = isset($date)? \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d') : null;
    }

    public function getStartDateAttribute($value)
    {
        return isset($value)? \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y') : null;
    }

    public function setFinishDateAttribute($date)
    {
        $this->attributes['finish_date'] =  isset($date)? \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d'): null;
    }

    public function getFinishDateAttribute($value)
    {
        return isset($value)? \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y') null;
    }    
*/

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
