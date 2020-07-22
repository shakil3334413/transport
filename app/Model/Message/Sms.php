<?php

namespace App\Model\Message;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sms extends Model
{
    use SoftDeletes;

    protected $table='sms';
    protected $fillable = [
        'sender_id', 'cell_no','message','status',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
