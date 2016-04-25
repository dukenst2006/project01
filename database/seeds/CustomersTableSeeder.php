<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'number'            => '0001',
                'name'              => 'Jean',
                'lastname'          => 'Francois',
                'dob'               => '2000-04-04',
                'email'             => 'jean@gmail.com',
                'sex'               => 'M',
                'occupation'        => 'Comptable',
                'city'              => 'Port-au-prince',
                'address'           => 'Delmas 65 #254',
                'phone'             => '37703581',
                'user_id'          => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'number'            => '0002',
                'name'              => 'Murlande',
                'lastname'          => 'Joseph',
                'dob'               => '2005-04-04',
                'email'             => 'murlande@gmail.com',
                'sex'               => 'F',
                'occupation'        => 'Econoiste',
                'city'              => 'Port-au-prince',
                'address'           => 'Petion ville #54',
                'phone'             => '37006985',
                'user_id'          => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ]);

    }
}
