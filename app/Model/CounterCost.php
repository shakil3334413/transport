<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CounterCost extends Model
{
    use SoftDeletes;

    protected $table='counter_costs';
    protected $fillable = [
        'counter_id', 'counterman_salary_id','helper_salary_id','checker_salaries_id','counter_cost_add_id','total_cost',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function counter()
    {
        return $this->belongsTo(Counter::class, 'counter_id','id');
    }
    public function checksalary()
    {
        return $this->belongsTo(CheckerSalary::class, 'checker_salaries_id','id');
    }
    public function helpersalary()
    {
        return $this->belongsTo(HelperSalary::class, 'helper_salary_id','id');
    }
    public function countermansalary()
    {
        return $this->belongsTo(CounterManSalary::class, 'counterman_salary_id','id');
    }

    public function countercostadd()
    {
        return $this->belongsTo(CounterCostAdd::class, 'counter_cost_add_id','id');
    }





}
