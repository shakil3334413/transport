<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OwnerAdvance extends Model
{
    use SoftDeletes;

    protected $table='owner_advances';
    protected $fillable = [
        'owner_id', 'counter_id','taka',
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
    public function counter(){
    	return $this->belongsTo('App\Model\Counter');
    }
}
