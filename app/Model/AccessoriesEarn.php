<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AccessoriesEarn extends Model
{
    use SoftDeletes;

    protected $table='accessories_earns';
    protected $fillable = [
        'counter_id', 'total_amount', 'shift','date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // public function earn()
    // {
    //     return $this->hasMany('App\Model\Earn','access_id');
    // }
}
