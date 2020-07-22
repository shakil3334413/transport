<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HelperInfo extends Model
{
    use SoftDeletes;

    protected $table='helper_infos';
    protected $fillable = [
        'name', 'phone','national_id','address','image',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function tdriverhelper(){
    	return $this->hasOne('App\Model\TodayDriverHelper','helper_id','id');
    }

    public function helpersalray(){
        return $this->hasMany(HelperSalary::class,'id','helper_id');
    }
}
