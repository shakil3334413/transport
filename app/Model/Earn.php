<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use App\Model\TicketEarn;
class Earn extends Model
{
    use SoftDeletes;

    protected $table='earns';
    protected $fillable = [
        'counter_id', 'ticket_id','access_id','total_earn',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function ticket()
    {
        return $this->belongsTo(TicketEarn::class, 'ticket_id','id');
    }
    public function accessoriesearn()
    {
        return $this->belongsTo('App\Model\AccessoriesEarn','access_id','id');
    }
    public function counter()
    {
        return $this->belongsTo(Counter::class, 'counter_id','id');
    }
}
