<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Unit;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::where('role','super admin')->first();

        $company = Company::where('owner_id',$superAdmin->id)->first();

        $units = [
            ['name'=>'kg','company_id'=>$company->id],
            ['name'=>'g','company_id'=>$company->id],
            ['name'=>'t','company_id'=>$company->id],
            ['name'=>'in','company_id'=>$company->id],
            ['name'=>'ft','company_id'=>$company->id],
            ['name'=>'m','company_id'=>$company->id],
            ['name'=>'km','company_id'=>$company->id],
            ['name'=>'mg','company_id'=>$company->id],
            ['name'=>'lb','company_id'=>$company->id],
            ['name'=>'dz','company_id'=>$company->id],
            ['name'=>'l','company_id'=>$company->id],
            ['name'=>'ml','company_id'=>$company->id],
        ];
        // Unit::create([
        //     'name' => 'kg',
        //     'company_id' => $company->id,
        // ]);
        DB::table('units')->insert($units);
    }
}
