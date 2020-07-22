<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DriverSalary extends Model
{
    use SoftDeletes;

    protected $table='driver_salaries';
    protected $fillable = [
        'driver_id', 'bus_id','salary_date','taka','date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function allbuscost(){
        return $this->hasMany(AllBusCost::class,'id','driver_salarie_id');
    }

    public function driverinfo()
    {
        return $this->belongsTo(DriverInfo::class, 'driver_id','id');
    }
}
