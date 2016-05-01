<?php

namespace App;
use App\Customer;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transactiontype(){
        return $this->hasOne('App\Transactiontype');
    }
    public  function customer(){
        return $this->belongsTo('App\Customer');
    }
}
