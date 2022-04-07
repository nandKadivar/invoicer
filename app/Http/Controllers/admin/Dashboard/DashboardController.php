<?php

namespace App\Http\Controllers\admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Expense;

class DashboardController extends Controller
{
    public function index(){
        $customers = Customer::where('company_id', 1)->get();
        $invoices = Invoice::where('company_id', 1)->get();
        $payments = Payment::where('company_id', 1)->get();
        $expenses = Expense::where('company_id', 1)->get();

        return view('admin.dashboard', ['customers' => $customers, 'invoices' => $invoices, 'payments' => $payments, 'all_expenses' => $expenses]);
    }
}
