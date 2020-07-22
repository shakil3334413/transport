<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AllBusCost extends Model
{
    use SoftDeletes;

    protected $table='all_bus_costs';
    protected $fillable = [
        'bus_id', 'gp_cost_add_id', 'driver_salarie_id','cost_add_id','total_cost',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function costadd()
    {
        return $this->belongsTo(CostAdd::class, 'cost_add_id','id');
    }
    public function gpcost()
    {
        return $this->belongsTo(GpCostAdd::class, 'gp_cost_add_id','id');
    }
    public function driversalary()
    {
        return $this->belongsTo(DriverSalary::class, 'driver_salarie_id','id');
    }
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id','id');
    }
}
