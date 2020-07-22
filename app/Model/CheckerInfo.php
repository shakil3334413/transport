<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CheckerInfo extends Model
{
    use SoftDeletes;

    protected $table='checker_infos';
    protected $fillable = [
        'name', 'phone', 'national_id','address','image',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function tchecker(){
    	return $this->hasOne('App\Model\TodayBusCheck','cheacker_id','id');
    }
    public function checksalary(){
        return $this->hasMany(CheckerSalary::class,'id','checker_id');
    }


}
