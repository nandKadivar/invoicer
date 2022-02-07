<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Str;

class AddOwnerIdToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('slug')->nullable();
            $table->unsignedInteger('owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users');
        });

        $user = User::where('role','super admin')->first();
        $companies = Company::all();

        if($companies && $user){
            foreach($companies as $i){
                $i->owner_id = $user->id;
                $i->slug = Str::slug($i->name);
                $i->save();

                $i->setupRoles();
                $user->assign('super admin');

                $users = User::where('role','admin')->get();
                $users->map(function($user){
                    $user->assign('super admin');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
