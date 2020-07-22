<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CounterCostAdd extends Model
{
    use SoftDeletes;

    protected $table='counter_cost_adds';
    protected $fillable = [
        'counter_id', 'counter_cost_id','taka','date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function allcountercost(){
        return $this->hasMany(CounterCost::class,'id','counter_cost_add_id');
    }

    public function countercostlist()
    {
        return $this->belongsTo(CounterCostList::class, 'counter_cost_id','id');
    }
}
