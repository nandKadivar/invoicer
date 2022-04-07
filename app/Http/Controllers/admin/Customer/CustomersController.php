<?php

namespace App\Http\Controllers\admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Http\Resources\CustomerResource;

class CustomersController extends Controller
{
    public function index(Request $request){
        // return view('admin.customers');

        // $limit = $request->has('limit') ? $request->limit : 10;

        // $customers = Customer::with('creator')
        //     ->whereCompany()
        //     ->applyFilters($request->all())
        //     ->select(
        //         'customers.*',
        //         DB::raw('sum(invoices.base_due_amount) as base_due_amount'),
        //         DB::raw('sum(invoices.due_amount) as due_amount'),
        //     )
        //     ->groupBy('customers.id')
        //     ->leftJoin('invoices', 'customers.id', '=', 'invoices.customer_id')
        //     ->paginateData($limit);

        // return (CustomerResource::collection($customers))
        //     ->additional(['meta' => [
        //         'customer_total_count' => Customer::whereCompany()->count(),
        //     ]]);
        // $customers = Customer::whereCompany()->get();
        $customers = Customer::whereCompany()->get();

        // $customers = (CustomerResource::collection($customers))
        //     ->additional(['meta' => [
        //         'customer_total_count' => Customer::whereCompany()->count(),
        //     ]]);

        return view('admin.customers',['customers'=>$customers]);
    }

    public function store(CustomerRequest $request){
        // $request->validate();
        // print_r($request->all());
        $customer = Customer::createCustomer($request);
        // echo "Store method";
        // print_r($request->all());
        // return new CustomerResource($customer);
        // return redirect()->route('admin.customers.view')->with('customer', new CustomerResource($customer));
        return response()->json([
            'success' => true,
            'id' => $customer->id
        ], 200);
    }

    public function createCustomer(){
        
    }
}
