<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bus extends Model
{
    use SoftDeletes;

    protected $table='buses';
    protected $fillable = [
        'model', 'number', 'lat','long',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function owner(){
    	return $this->hasMany('App\Model\OwnerBus');
    }

    public function tdriverhelper(){
    	return $this->hasOne('App\Model\TodayDriverHelper','bus_id','id');
    }
    public function tchecker(){
    	return $this->hasOne('App\Model\TodayBusCheck','bus_id','id');
    }

    public function bustripnumber(){
    	return $this->hasMany('App\Model\BusTripNumber');
    }

    public function eachbusincome(){
    	return $this->hasOne('App\Model\EachBusIncome','id','bus_id');
    }

    public function allbuscost(){
        return $this->hasMany(AllBusCost::class,'id','bus_id');
    }
}
