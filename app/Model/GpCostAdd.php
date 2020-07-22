<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class GpCostAdd extends Model
{
    use SoftDeletes;

    protected $table='gp_cost_adds';
    protected $fillable = [
        'bus_id', 'taka','date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function allbuscost(){
        return $this->hasMany(AllBusCost::class,'id','gp_cost_add_id');
    }
}
