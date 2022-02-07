<?php

namespace App\Http\Controllers\Admin\RecurringInvoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecurringInvoicesController extends Controller
{
    public function index(){
        return view('admin.recurring-invoices');
    }
}
