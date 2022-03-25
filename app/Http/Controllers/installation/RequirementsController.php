<?php

namespace App\Http\Controllers\installation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequirementsController extends Controller
{

    public function __construct(requirementsChecker $checker){

    }

    public function requirements(){
        return "All is well!";
    }
}
