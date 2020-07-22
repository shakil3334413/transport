<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CheckerSalary extends Model
{
    use SoftDeletes;

    protected $table='checker_salaries';
    protected $fillable = [
        'checker_id', 'counter_id', 'shift','salary_date','taka',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function allcountercost(){
        return $this->hasMany(CounterCost::class,'id','checker_salaries_id');
    }

    public function checkerinfo()
    {
        return $this->belongsTo(CheckerInfo::class, 'checker_id','id');
    }
}
