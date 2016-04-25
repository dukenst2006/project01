<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactiontype extends Model
{
    public function transaction(){
        return $this->belongsTo('Transaction');
    }
}
