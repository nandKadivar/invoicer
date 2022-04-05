<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentModes = [
            ['id' => 1,'name' => 'Cash', 'company_id' => 1],
            ['id' => 2,'name' => 'Check', 'company_id' => 1],
            ['id' => 3,'name' => 'Bank Transfer', 'company_id' => 1]
        ];

        DB::table('payment_methods')->insert($paymentModes);
    }
}
