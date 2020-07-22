<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OwnerBus extends Model
{
    use SoftDeletes;

    protected $table='owner_buses';
    protected $fillable = [
        'owner_id', 'bus_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function owner(){
    	return $this->belongsTo('App\Model\Owner');
    }
    public function bus(){
    	return $this->belongsTo('App\Model\Bus');
    }
}
