<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CostList extends Model
{
    use SoftDeletes;

    protected $table='cost_lists';
    protected $fillable = [
        'cost_name', 'cost_details',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function costadd(){
        return $this->hasMany(CostAdd::class,'id','cost_id');
    }
}
