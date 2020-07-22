<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BusTripNumber extends Model
{
    use SoftDeletes;

    protected $table='bus_trip_numbers';
    protected $fillable = [
        'bus_id', 'trip_number', 'trip_date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function bus(){
    	return $this->belongsTo('App\Model\Bus');
    }
}
