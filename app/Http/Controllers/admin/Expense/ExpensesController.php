<?php

namespace App\Http\Controllers\Admin\Expense;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    public function index(){
        $expenses = Expense::with(['customer','company', 'currency','paymentMethod'])->where('company_id',1)->get();
        return view('admin.expenses',['expenses' => $expenses]);
    }

    public function store(Request $request){
        // print_r($request->all());

        $amount = $request->amount;
        $exchangeRate = $request->exchange_rate;

        $request->merge([
            'creator_id' => Auth::user()->id,
            'base_amount' => $amount*$exchangeRate,
        ]);

        $expense = Expense::create($request->all());
        $expenseId = $expense->id;

        return response()->json([
            'expense' => $expense,
            'id' => $expenseId
        ], 200);
    }
}
