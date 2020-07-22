<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HelperSalary extends Model
{
    use SoftDeletes;

    protected $table='helper_salaries';
    protected $fillable = [
        'helper_id', 'counter_id','salary_date','taka','shift',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function allcountercost(){
        return $this->hasMany(CounterCost::class,'id','helper_salary_id');
    }

    public function helperinfo()
    {
        return $this->belongsTo(HelperInfo::class, 'helper_id','id');
    }
}
