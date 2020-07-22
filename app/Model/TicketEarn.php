<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Earn;
class TicketEarn extends Model
{
    use SoftDeletes;

    protected $table='ticket_earns';
    protected $fillable = [
        'counter_id', 'total_ticket','per_ticket_price','total_amount','shift','date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function earn(){
        return $this->hasMany(Earn::class,'id','ticket_id');
    }
}
