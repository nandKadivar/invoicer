<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Currency;
use Silber\Bouncer\BouncerFacade;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@invoicer.com',
            'name' => 'Nand Kadivar',
            'role' => 'super admin',
            'password' => Hash::make('admin@123')
        ]);

        $company = Company::create([
            'name' => 'Icone Industry',
            'Owner_id' => $user->id,
            'slug' => 'xyz'
        ]);

        $company->unique_hash = Hashids::connection(Company::class)->encode($company->id);
        $company->save();
        $company->setupDefaultData();
        $user->companies()->attach($company->id);
        BouncerFacade::scope()->to($company->id);

        $user->assign('super admin');

    }
}
