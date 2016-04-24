<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    //MASS ASSIGNMENT
    protected $fillable = array('number', 'name', 'lastname', 'dob', 'sex', 'occupation', 'city', 'address', 'phone', 'users_id');


    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

}
