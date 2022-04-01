<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class addressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'address_street_1' => '2214 abc street',
            'city' => 'Jamnagar',
            'state' => 'Gujarat',
            'country_id' => 101,
            'zip' => '360530',
            'phone' => '+91 8200523263',
            'company_id' => 1
        ]);
    }
}
