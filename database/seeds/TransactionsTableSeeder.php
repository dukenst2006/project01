<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'amount'            => '500',
                'reference'              => '00123',
                'customer_id'          => '1',
                'transactiontype_id'   => '1',
                'user_id'             => '1',
            ],
            [
                'amount'            => '2000',
                'reference'              => '00132',
                'customer_id'          => '2',
                'transactiontype_id'   => '2',
                'user_id'             => '1',
            ],
            [
                'amount'            => '2500',
                'reference'              => '03232',
                'customer_id'          => '2',
                'transactiontype_id'   => '1',
                'user_id'             => '1',
            ],
            [
                'amount'            => '2000',
                'reference'              => '00132',
                'customer_id'          => '1',
                'transactiontype_id'   => '2',
                'user_id'             => '2',
            ],
        ]);
    }
}
