<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function transactiontype(){
        return $this->hasOne(Transaction);
    }
    public  function customer(){
        return $this->belongsTo('Customer');
    }
}
