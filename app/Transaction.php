<?php

namespace App;
use App\Customer;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected $fillable = ['amount', 'reference', 'transactiontype_id', 'user_id', 'customer_id', 'created_at' ];

    public function transactiontype(){
        return $this->hasOne('App\Transactiontype');
    }
    public  function customer(){
        return $this->belongsTo('App\Customer');
    }
}
