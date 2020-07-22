<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CheckPost extends Model
{
    use SoftDeletes;

    protected $table='check_posts';
    protected $fillable = [
        'name', 'address',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    public function tchecker(){
    	return $this->hasOne('App\Model\TodayBusCheck','checkpost_id','id');
    }
}
