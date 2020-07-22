<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Counter extends Model
{
    use SoftDeletes;

    protected $table='counters';
    protected $fillable = [
        'name', 'address',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function owneradvance(){
    	return $this->hasMany('App\Model\OwnerAdvance');
    }
    public function earn(){
    	return $this->hasmany('App\Model\Earn','id','counter_id');
    }

    public function allcountercost(){
        return $this->hasMany(CounterCost::class,'id','counter_id');
    }

}
