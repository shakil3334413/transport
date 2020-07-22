<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DriverInfo extends Model
{
    use SoftDeletes;

    protected $table='driver_infos';
    protected $fillable = [
        'name', 'phone','national_id','address','image','driving_liceing',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function tdriverhelper(){
    	return $this->hasOne('App\Model\TodayDriverHelper','bus_id','id');
    }

    public function driversalary(){
        return $this->hasMany(DriverSalary::class,'id','driver_id');
    }
}
