<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CounterCostList extends Model
{
    use SoftDeletes;

    protected $table='counter_cost_lists';
    protected $fillable = [
        'cost_name', 'cost_details',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function countercostadd(){
        return $this->hasMany(CounterCostAdd::class,'id','counter_cost_id');
    }
}
