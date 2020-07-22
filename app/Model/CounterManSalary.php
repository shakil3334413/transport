<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CounterManSalary extends Model
{
    use SoftDeletes;

    protected $table='counter_man_salaries';
    protected $fillable = [
        'counterman_id', 'counter_id','shift','salary_date','taka',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function allcountercost(){
        return $this->hasMany(CounterCost::class,'id','counterman_salary_id');
    }

    public function countermaninfo()
    {
        return $this->belongsTo(CounterManInfo::class, 'counterman_id','id');
    }
}
