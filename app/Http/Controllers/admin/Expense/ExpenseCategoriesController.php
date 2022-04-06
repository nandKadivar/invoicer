<?php

namespace App\Http\Controllers\admin\Expense;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoriesController extends Controller
{
    public function store(Request $request){
        // print_r($request->all());
        $category = ExpenseCategory::create($request->all());

        $categories = ExpenseCategory::where('company_id',1)->get();

        return response()->json([
            'updated_categories' => $categories,
            'id' => $category->id,
            'name' => $category->name
        ], 200);
    }
}
