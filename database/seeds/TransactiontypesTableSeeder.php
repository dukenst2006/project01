<?php

use Illuminate\Database\Seeder;

class TransactiontypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactiontypes')->insert([
            [
                'name'            => 'Deposit'
            ],
            [
                'name'            => 'withdrawl'
            ],
            [
                'name'            => 'Subscription Fee'
            ],
        ]);

    }
}
