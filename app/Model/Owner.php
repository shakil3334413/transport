<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Owner extends Model
{
    use SoftDeletes;

    protected $table='owners';
    protected $fillable = [
        'name', 'phone','email','bank_number','national_id','address','image',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function ownerbus(){
    	return $this->hasMany('App\Model\OwnerBus');
    }

    public function owneradvance(){
    	return $this->hasMany('App\Model\OwnerAdvance');
    }
}
