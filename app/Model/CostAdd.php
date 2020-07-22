<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CostAdd extends Model
{
    use SoftDeletes;

    protected $table='cost_adds';
    protected $fillable = [
        'bus_id', 'cost_id','taka','date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function allbuscost(){
        return $this->hasMany(AllBusCost::class,'id','cost_add_id');
    }
    public function costname()
    {
        return $this->belongsTo(CostList::class, 'cost_id','id');
    }
}
