<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CounterManInfo extends Model
{
    use SoftDeletes;

    protected $table='counter_man_infos';
    protected $fillable = [
        'name', 'phone','national_id','address','image',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function counterman(){
        return $this->hasMany(CounterManSalary::class,'id','counterman_id');
    }
}
