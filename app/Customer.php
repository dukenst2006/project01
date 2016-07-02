<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    //MASS ASSIGNMENT
    protected $fillable = array('number', 'name', 'lastname', 'dob', 'cin', 'sex', 'occupation', 'city', 'address', 'phone', 'email', 'image', 'user_id','status');


    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    
    public  function transaction(){
        return $this->hasMany('App\Transaction');
    }

}
