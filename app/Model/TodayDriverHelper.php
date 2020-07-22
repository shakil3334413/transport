<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TodayDriverHelper extends Model
{
    use SoftDeletes;

    protected $table='today_driver_helpers';
    protected $fillable = [
        'driver_id', 'helper_id','bus_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function driverinfo()
    {
        return $this->belongsTo('App\Model\DriverInfo','driver_id','id');
    }

    public function helper_info()
    {
        return $this->belongsTo('App\Model\HelperInfo','helper_id','id');
    }
    public function bus()
    {
        return $this->belongsTo('App\Model\Bus','bus_id','id');
    }
}
