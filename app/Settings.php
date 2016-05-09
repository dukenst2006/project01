<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
   protected $fillable = array('app_name', 'app_description', 'app_email', 'app_phone',
      'us_rate', 'euro_rate', 'peso_rate' , 'canadian_rate', 'tax', 'mini_bal', 'currency', 'adress', 'app_contact',
      'created_at','updated_at' );
}
