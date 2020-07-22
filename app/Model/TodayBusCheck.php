<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TodayBusCheck extends Model
{
    use SoftDeletes;

    protected $table='today_bus_checks';
    protected $fillable = [
        'Cheacker_id', 'checkpost_id','bus_id','check_date','check_time',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    public function checkerinfo()
    { 
        return $this->belongsTo('App\Model\CheckerInfo','cheacker_id','id');
    }

    public function bus()
    {
        return $this->belongsTo('App\Model\Bus','bus_id','id');
    }

    public function checkpost()
    {
        return $this->belongsTo('App\Model\CheckPost','checkpost_id','id');
    }
}
