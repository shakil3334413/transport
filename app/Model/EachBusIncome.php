<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EachBusIncome extends Model
{
    public function bus(){
    	return $this->belongsTo('App\Model\Bus','bus_id','id');
    }
}
