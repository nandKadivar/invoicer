@extends('layouts.admin');

@section('title')
Invoicer - New Invoice
@endsection

@section('content')
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.customers')}}">
                <i class="bi bi-person"></i>
                <span>Customers</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.items')}}">
                <i class="bi bi-box"></i>
                <span>Items</span>
            </a>
        </li>

        <br>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.invoices')}}">
                <i class="bi bi-receipt"></i>
                <span>Invoices</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.recurring-invoices')}}">
                <i class="bi bi-receipt-cutoff"></i>
                <span>Recurring Invoices</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.payments')}}">
                <i class="bi bi-credit-card"></i>
                <span>Payments</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.expenses')}}">
                <i class="bi bi-calculator"></i>
                <span>Expenses</span>
            </a>
        </li>

        <br>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.users')}}">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.reports')}}">
                <i class="bi bi-bar-chart"></i>
                <span>Reports</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.settings')}}">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</aside>
<!-- End Sidebar-->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>New Invoice</h1>
        <nav class="d-flex flex-row justify-content-between align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.invoices')}}">Invoices</a></li>
                <li class="breadcrumb-item active">New Invoice</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <form>
        <!-- <div class='col-md-12'> -->
        <!-- <form> -->
        <div class="col-12 d-flex flex-row justify-content-between flex-wrap">
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 p-2">
                <div class="add-customer-box col-12" onclick="openCustomerBox()">
                    <i class="bi bi-person-circle" style="font-size: 24px; margin-right: 10px;"></i><span style="font-size: 20px; font-weight: 520;">New Customer</span>
                    <div class="customer-box">
                        <input type="text" class="form-control" id="myInput1" onkeyup="myFunction1()" placeholder="Search" title="Type in a name">
                        <ul class="customer-ul">
                            @foreach($customers as $customer)
                                <li>
                                    <div class="d-flex flex-row justify-content-between align-items-center" onclick="selectCustomer({{$loop->index}})">
                                        <div class="d-flex justify-content-center align-items-center" style="width: 45px; height: 45px; background-color: #cbd5e1; border-radius: 50%; margin-right: 10px;">
                                            <span style="font-weight: 700;">{{$customer->name[0]}}</span>
                                        </div>
                                        <div class="company-info d-flex flex-column justify-content-between align-items-end">
                                            <span style="font-weight: 600;">{{$customer->name}}</span>
                                            <span style="font-weight: 600; color: #94a3b8;">{{$customer->contact_name}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach                         
                            {{-- <li>
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="d-flex justify-content-center align-items-center" style="width: 45px; height: 45px; background-color: #cbd5e1; border-radius: 50%; margin-right: 10px;">
                                        <span style="font-weight: 700;">P</span>
                                    </div>
                                    <div class="company-info d-flex flex-column justify-content-between align-items-end">
                                        <span style="font-weight: 600;">Patel Steels</span>
                                        <span style="font-weight: 600; color: #94a3b8;">Meet Kadivar</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="d-flex justify-content-center align-items-center" style="width: 45px; height: 45px; background-color: #cbd5e1; border-radius: 50%; margin-right: 10px;">
                                        <span style="font-weight: 700;">I</span>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between align-items-end">
                                        <span style="font-weight: 600;">Icon Stones</span>
                                        <span style="font-weight: 600; color: #94a3b8;">Nand Kadivar</span>
                                    </div>
                                </div>
                            </li> --}}
                        </ul>
                        <!-- Customer not found warning Start-->
                        <div class="d-none flex-row justify-content-center align-items-center py-3">
                            <span style="font-weight: 600; color: #94a3b8;">No customer found!</span>
                        </div>
                        <!-- Customer not found warning End -->
                        <div data-bs-toggle="modal" data-bs-target="#addNewCustomerModel" class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;">
                            <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                            <span class="text-primary">Add New Customer</span>
                        </div>
                    </div>
                </div>
                <div class="selected-customer-box col-12 p-3">
                    <div class="col-12 d-flex flex-row align-items-center justify-content-between mb-2">
                        <span class="selected_customer_name" style="font-weight: 600; font-size: 16px;" name="selected_customer_name"></span>
                        <div class="customer-deselect-btn d-flex flex-row align-items-center" style="cursor: pointer; font-size: 14px;" onclick="deselect()">
                            <span><i class="bi bi-x-circle"></i> Remove</span>
                        </div>
                    </div>
                    <div class="col-10 d-flex flex-row align-items-center justify-content-between p-0 flex-wrap">
                        <div class="d-flex flex-column align-items-between" style="font-size: 14px;">
                            <div class="row mb-1">
                                <span style="color: #94a3b8; font-weight: 600;">BILL TO</span>
                            </div>
                            <div class="row">
                                <span class="selected_customer_billing_name" name="selected_customer_billing_name"></span>
                            </div>
                            <div class="row">
                                <span class="selected_customer_billing_address_1" name="selected_customer_billing_address_1">,</span>
                            </div>
                            <div class="row">
                                <span class="selected_customer_billing_address_2" name="selected_customer_billing_address_2">.</span>
                            </div>
                            <div class="row">
                                <span class="selected_customer_billing_zip" name="selected_customer_billing_zip"></span>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-between" style="font-size: 14px;">
                            <div class="row mb-1">
                                <span style="color: #94a3b8; font-weight: 600;">SHIP TO</span>
                            </div>
                            <div class="row">
                                <span class="selected_customer_shipping_name" name="selected_customer_shipping_name"></span>
                            </div>
                            <div class="row">
                                <span class="selected_customer_shipping_address_1" name="selected_customer_shipping_address_1">,</span>
                            </div>
                            <div class="row">
                                <span class="selected_customer_shipping_address_2" name="selected_customer_shipping_address_2">.</span>
                            </div>
                            <div class="row">
                                <span class="selected_customer_shipping_zip" name="selected_customer_shipping_zip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="addNewCustomerModel" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                        <form action="">
                            <div class="modal-content">
                                <div class="modal-header" style="border-top: 6px solid var(--bs-primary);">
                                    <h5 class="modal-title">Add Customer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body row p-4">
                                    <div class="card-title">Basic Details</div>
                                    {{-- <div class="col-12"> --}}
                                        <div class="col-md-6">
                                            <label for="inputName5" class="form-label">GST Number</label>
                                            <input type="text" class="form-control" id="inputName5">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputName5" class="form-label">Display Name</label>
                                            <input type="text" class="form-control" id="inputName5">
                                        </div>
                                    {{-- </div> --}}
                                      <div class="col-md-6">
                                        <label for="inputEmail5" class="form-label">Primary Contact Name</label>
                                        <input type="text" class="form-control" id="inputEmail5">
                                      </div>
                                      <div class="col-md-6">
                                        <label for="inputEmail5" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail5">
                                      </div>
                                      <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="inputPassword5">
                                      </div>
                                      
                                      <div class="col-md-6">
                                        <label for="inputState" class="form-label">Primary Currency</label>
                                        <select id="inputState" class="form-select">
                                          <option selected>Choose...</option>
                                          <option>...</option>
                                        </select>
                                      </div>
                                      <div class="col-md-6">
                                        <label for="inputZip" class="form-label">Website</label>
                                        <input type="text" class="form-control" id="inputZip">
                                      </div>
                                      
                                      <div class="col-md-12">
                                        <hr/>
                                      </div>
                                      
                                      <div class="card-title">Billing Address</div>
                      
                                      <div class="col-md-6">
                                        <label for="inputName5" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="inputName5">
                                      </div>
                      
                                      <div class="col-md-6">
                                        <label for="inputState" class="form-label">Country</label>
                                        <select id="inputState" class="form-select select">
                                          <option selected>Select Country</option>
                                          <option>...</option>
                                        </select>
                                      </div>
                      
                                      <div class="col-md-6">
                                        <label for="inputName5" class="form-label">State</label>
                                        <input type="text" class="form-control" id="inputName5">
                                      </div>
                      
                                      <div class="col-md-6">
                                        <label for="inputName5" class="form-label">City</label>
                                        <input type="text" class="form-control" id="inputName5">
                                      </div>
                      
                                      <div class="col-6">
                                        <label for="inputAddress5" class="form-label">Address 1</label>
                                        <input type="text" class="form-control" id="inputAddres5s" placeholder="1234 Main St">
                                      </div>
                      
                                      <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="inputPassword5">
                                      </div>
                      
                                      <div class="col-6">
                                        <label for="inputAddress2" class="form-label">Address 2</label>
                                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                      </div>
                      
                                      <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">Zip Code</label>
                                        <input type="number" class="form-control" id="inputPassword5">
                                      </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary">
                                          <i class="bi bi-download"></i>
                                          Save Customer
                                        </button>
                                    </div>
                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12 col-12 p-2 d-flex flex-column align-items-center justify-content-between" style="height: 180px;">
                <!-- <div class="row mb-12 d-flex flex-column"> -->
                <div class="col-12 d-flex flex-column">
                    <label for="inputEmail" class="col-form-label" style="padding-top: 0px;">Invoice Date</label>
                    <div class="col-12">
                        @php
                            // echo date("Y-m-d");
                            echo '<input type="date" class="form-control" value="'.date("Y-m-d").'">';
                        @endphp
                        {{-- <input type="date" class="form-control" value="2020-03-30"> --}}
                    </div>
                </div>

                <div class="col-12 d-flex flex-column">
                    <label for="inputEmail" class="col-form-label" style="padding-top: 0px;">Invoice Number</label>
                    <div class="col-12">
                        @php
                            echo '<input type="text" class="form-control" style="width: 100%" disabled value="INV-'.rand(000001,999999).'">';
                        @endphp
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12 col-12 p-2 d-flex flex-column align-items-center justify-content-between" style="height: 180px;">
                <!-- <div class="row mb-12 d-flex flex-column"> -->
                <div class="col-12 d-flex flex-column">
                    <label for="inputEmail" class="col-form-label" style="padding-top: 0px;">Due Date</label>
                    <div class="col-12">
                        @php
                            // echo date("Y-m-d");
                            echo '<input type="date" class="form-control" style="width: 100%" value="'.date('Y-m-d', strtotime(date("Y-m-d"). ' + 10 days')).'" min="'.date("Y-m-d").'">';
                        @endphp
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <!-- </form> -->
        <!-- </div> -->

        <div class="col-12 mt-5 d-flex flex-column align-items-center  p-2">
            <table class="col-12 items-table" cellspacing="0" cellpadding="10" style="background-color: #fff; border: 1px solid #ececec; border-radius: 5px;">
                <thead style="border-bottom: 1px solid #ececec;">
                    <tr>
                        <th class="p-3">Items</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Taxable Value</th>
                        <th>SGST</th>
                        <th>CGST</th>
                        <th>IGST</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $n = 1;
                        for ($i=1; $i<=$n ; $i++) { 
                            echo '<tr>
                                    <td style="position: relative;">
                                        <input type="text" name="item1" list="items" class="form-control">
                                        <datalist id="items">
                                            <option value="Stones" style="background-color: #fff;">
                                            <option value="Steel">
                                            <option value="Cement">
                                        </datalist>
                                    </div>
                                </td>
                                <td><input type="number" name="price1" class="form-control"></td>
                                <td><input type="text" name="qty1" class="form-control"></td>
                                <td>$ 0.00</td>
                            </tr>';
                        }
                    @endphp --}}
                    <tr>
                        <td style="position: relative;">
                            {{-- <input type="text" name="item1" list="items" class="form-control"> --}}
                            {{-- <datalist id="items">
                                <option value="Stones" style="background-color: #fff;">
                                <option value="Steel">
                                <option value="Cement">
                            </datalist> --}}
                            <input type="text" class="form-control" id="itemInput1" onkeyup="searchItem(1)" placeholder="" title="Type in a name" onclick="openItemBox(1)">
                            <div id="itemBox1" class="item-box">
                                <ul id="item-ul-1" class="item-ul scroll-area" style="max-height: 200px; overflow-y: scroll;">
                                    @foreach($items as $item)
                                        <li onclick="selectItem({{$loop->index}},1)">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <span style="font-weight: 600;">{{$item->name}}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                    {{-- <li>
                                        <div class="d-flex flex-row justify-content-between align-items-center">
                                            <span style="font-weight: 600;">Stones</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex flex-row justify-content-between align-items-center">
                                            <span style="font-weight: 600;">Steel</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex flex-row justify-content-between align-items-center">
                                            <span style="font-weight: 600;">Cement</span>
                                        </div>
                                    </li> --}}
                                </ul>
                                <div class="d-none flex-row justify-content-center align-items-center py-3">
                                    <span style="font-weight: 600; color: #94a3b8;">No item found!</span>
                                </div>
                                <div data-bs-toggle="modal" data-bs-target="#verticalycentered" class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;">
                                    <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                                    <span class="text-primary">Add New Item</span>
                                </div>
                            </div>
                        </td>
                        <td><input type="number" name="price1" class="form-control"></td>
                        <td><input type="text" name="qty1" class="form-control"></td>
                        <td>$ 0.00</td>
                        <td>
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">(9%)</label>
                            <span>$ 0.00</span>
                        </td>
                        <td>
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">(9%)</label>
                            <span>$ 0.00</span>
                        </td>
                        <td>
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">(9%)</label>
                            <span>$ 0.00</span>
                        </td>
                        <td>$ 0.00</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;" onclick="addRow()">
                <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                <span class="text-primary">Add New Item</span>
            </div>
        </div>

        <div class="col-12 mt-5 d-flex flex-row justify-content-between flex-wrap  p-2">
            <div class="col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column">
                <span style="font-weight: 600;">Notes</span>
                <div id="editor">
                </div>
                <div class="d-flex flex-row justify-content-end align-items-center p-2" style="position: relative; background-color: #fff; border: 1px solid #c4c4c4; border-top: 0px; border-radius: 0px 0px 2px 2px;">
                    <button type="button" class="btn btn-outline-primary" onclick="openFiledBox()"><i class="bi bi-plus-lg"></i> Insert Fields</button>
                    <div class="field-box">
                        <ul class="filed-ul">
                            <span>Customer</span>
                            <li>
                                <i class="bi bi-arrow-return-right"></i> Display Name
                            </li>
                            <li>
                                <i class="bi bi-arrow-return-right"></i> Contact Name
                            </li>
                        </ul>

                        <ul class="filed-ul">
                            <span>Invoice</span>
                            <li>
                                <i class="bi bi-arrow-return-right"></i> Date
                            </li>
                        </ul>

                        <ul class="filed-ul">
                            <span>Company</span>
                            <li>
                                <i class="bi bi-arrow-return-right"></i> Company Name
                            </li>
                            <li>
                                <i class="bi bi-arrow-return-right"></i> Country
                            </li>
                            <li>
                                <i class="bi bi-arrow-return-right"></i> State
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 col-sm-12 col-12">
                <span style="font-weight: 600; opacity: 0;">-</span>
                <div class="d-flex flex-column p-3" style="background-color: #fff; border-radius: 5px; border: 1px solid #ececec;">
                    <div class="col-lg-12 d-flex justify-content-between align-items-center">
                        <span style="font-weight: 600; color: #94a3b8; text-transform: uppercase;">Sub Total</span>
                        <span style="color: #040405;">0.00</span>
                    </div>
                    <div class="col-lg-12 pt-3 d-flex justify-content-between align-items-center">
                        <span style="font-weight: 600; color: #94a3b8; text-transform: uppercase;">Discount</span>
                        <div style="border: 1px solid rgb(226 232 240); border-radius: 2px;">
                            <input type="text" style="display: inline-block; width: 70px; padding: 6px 12px; border: 0; border-right: 1px solid rgb(226 232 240); " value="0 " />
                            <select id="inputGroupSelect01" style="display: inline-block; width: 60px; padding: 6px 12px; border: 0; ">
                                <option value="1" select>$</option>
                                <option value="2">%</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 pt-3 d-flex flex-column justify-content-center align-items-end" style="position: relative; ">
                        <span class="text-primary" style="font-weight: 600; text-transform: uppercase; cursor: pointer; " onclick="openTaxBox()">+ Add Tax</span>
                        <div class="tax-box">
                            <input type="text" class="form-control" id="myInput2" onkeyup="myFunction2()" placeholder="Search" title="Type in a name">
                            <ul class="tax-ul">
                                <li>
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <span style="font-weight: 600;">SST</span>
                                        <span style="font-weight: 600;">8%</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <span style="font-weight: 600;">CST</span>
                                        <span style="font-weight: 600;">8%</span>
                                    </div>
                                </li>
                            </ul>
                            <!-- Tax not found warning Start-->
                            <div class="d-none flex-row justify-content-center align-items-center py-3">
                                <span style="font-weight: 600; color: #94a3b8;">No tax found!</span>
                            </div>
                            <!-- Tax not found warning End -->
                            <div data-bs-toggle="modal" data-bs-target="#verticalycentered" class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;">
                                <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                                <span class="text-primary">Add New Tax</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <form action="">
                                <div class="modal-content">
                                    <div class="modal-header" style="border-top: 6px solid var(--bs-primary);">
                                        <h5 class="modal-title">Add Tax</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex flex-column align-items-center">
                                        <div class="col-12 py-2 d-flex flex-row justify-content-between align-items-center">
                                            <Span style="font-weight: 600;">Name</Span>
                                            <input class="col-8" type="text" class="form-control">
                                        </div>
                                        <div class="col-12 py-2 d-flex flex-row justify-content-between align-items-center">
                                            <Span style="font-weight: 600;">Percentage</Span>
                                            <input class="col-8" type="number" value="0.00" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary">
                                              <i class="bi bi-download"></i>
                                              Save Tax
                                            </button>
                                        </div>
                                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12 pt-2 ">
                        <hr />
                    </div>
                    <div class="col-lg-12 pt-2 d-flex justify-content-between align-items-center ">
                        <span style="font-weight: 600; color: #94a3b8; text-transform: uppercase; ">Total Amount:</span>
                        <span class="text-primary" style="font-weight: 600; text-transform: uppercase; ">0.00</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 d-flex flex-column flex-wrap  p-2">
            <!-- <div class="col-12"> -->
            <span style="font-weight: 600;">Select Template</span>
            <!-- </div> -->
            <!-- <div class="col-12"> -->
            <div data-bs-toggle="modal" data-bs-target="#templateModel" class="mt-2 col-2 p-2 d-flex justify-content-center align-items-center" style="background-color: #e1e8f0; border-radius: 5px; cursor: pointer;">
                <span style="margin-right: 5px">invoice 1</span>
                <i class="bi bi-pencil"></i>
            </div>
            <!-- </div> -->

            <div class="modal fade" id="templateModel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <!-- <form action=""> -->
                    <div class="modal-content">
                        <div class="modal-header" style="border-top: 6px solid var(--bs-primary);">
                            <h5 class="modal-title">Choose a template</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex flex-column align-items-center">
                            <div class="col-12 py-2 d-flex flex-row justify-content-between align-items-center">
                                <Span style="font-weight: 600;">Name</Span>
                                <input class="col-8" type="text" class="form-control">
                            </div>
                            <div class="col-12 py-2 d-flex flex-row justify-content-between align-items-center">
                                <Span style="font-weight: 600;">Percentage</Span>
                                <input class="col-8" type="number" value="0.00" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-center">
                                <button type="button" class="btn btn-primary">
                                      <i class="bi bi-download"></i>
                                      Save Tax
                                    </button>
                            </div>
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="button" class="btn btn-primary">
                <i class="bi bi-download"></i>
                Save Invoice
            </button>
        </div>
    </form>
</main>

<script>

    var selectedCustomerIndex = null;
    
    const selectCustomer = (index) => {
        selectedCustomerIndex = index;
        document.querySelector('.add-customer-box').style.display = 'none';
        var selectedCustomerBox = document.querySelector('.selected-customer-box');
        selectedCustomerBox.style.display = 'flex';
        
        var customers = <?php echo json_encode($customers); ?>;

        console.log(customers);
        console.log(items);
        document.querySelector('.selected_customer_name').innerHTML = customers[index].name;
        document.querySelector('.selected_customer_billing_name').innerHTML = customers[index].billing.name;
        document.querySelector('.selected_customer_billing_address_1').innerHTML = customers[index].billing.address_street_1;
        document.querySelector('.selected_customer_billing_address_2').innerHTML = customers[index].billing.address_street_2;
        document.querySelector('.selected_customer_billing_zip').innerHTML = customers[index].billing.zip;
        document.querySelector('.selected_customer_shipping_name').innerHTML = customers[index].shipping.name;
        document.querySelector('.selected_customer_shipping_address_1').innerHTML = customers[index].shipping.address_street_1;
        document.querySelector('.selected_customer_shipping_address_2').innerHTML = customers[index].shipping.address_street_2;
        document.querySelector('.selected_customer_shipping_zip').innerHTML = customers[index].shipping.zip;
    }

    const selectItem = (index, row) => {
        // alert('Hiii');
        // console.log(row);
        var items = <?php echo json_encode($items); ?>;
        document.querySelector('#itemInput'+row).value = items[index].name;
    }

    const deselect = () => {
        selectedCustomerIndex = null;
        document.querySelector('.add-customer-box').style.display = 'flex';
        var selectedCustomerBox = document.querySelector('.selected-customer-box');
        selectedCustomerBox.style.display = 'none';
    }

    const openCustomerBox = () => {
        var customerBox = document.querySelector(".customer-box");
        customerBox.classList.add("active-box");
    }

    const openTaxBox = () => {
        // alert('Clicked!')
        var taxBox = document.querySelector(".tax-box");
        taxBox.classList.add("active-box");
    }

    const openFiledBox = () => {
        var filedBox = document.querySelector(".field-box");
        filedBox.classList.add("active-box");
    }

    const openItemBox = (row) => {
        var itemBox = document.querySelector("#itemBox"+row);
        itemBox.style.display = "flex";
    }

    window.addEventListener('mouseup', function(event) {
        var taxBox = document.querySelector(".tax-box");
        if (event.target != taxBox && event.target.parentNode != taxBox) {
            taxBox.classList.remove("active-box");
        }
    });

    window.addEventListener('mouseup', function(event) {
        var customerBox = document.querySelector(".customer-box");
        if (event.target != customerBox && event.target.parentNode != customerBox) {
            customerBox.classList.remove("active-box");
        }
    });

    window.addEventListener('mouseup', function(event) {
        var fieldBox = document.querySelector(".field-box");
        if (event.target != fieldBox && event.target.parentNode != fieldBox) {
            fieldBox.classList.remove("active-box");
        }
    });

    window.addEventListener('mouseup', function(event) {
        // var itemBox = document.querySelector(".item-box");
        var allItemBoxs = $(".item-box").map(function(){
            if (event.target != this && event.target.parentNode != this) {
                this.style.display = "none";
            }
        }).get();
        // if (event.target != itemBox && event.target.parentNode != itemBox) {
        //     itemBox[i].style.display = "none";
        // }
    });

    const addRow = () => {
        var table = document.querySelector(".items-table");
        var row = table.insertRow();
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);
        var cell9 = row.insertCell(8);
        
        // cell1.innerHTML = "<td><input type='text' list='items' class='form-control'><datalist id='items'><option value='Stones' style='background-color: #fff;'><option value='Steel'><option value='Cement'></datalist></td>"
        // cell1.innerHTML = "<td style='position: relative;'><input type='text' class='form-control' id='itemInput"+row.rowIndex+"' onkeyup='searchItem("+row.rowIndex+")' placeholder='' title='Type in a name' onclick='openItemBox("+row.rowIndex+")'><div id='itemBox"+row.rowIndex+"' class='item-box'><ul class='item-ul scroll-area' style='max-height: 200px; overflow-y: scroll;'>@foreach($items as $item)<li><div class='d-flex flex-row justify-content-between align-items-center'><span style='font-weight: 600;'>{{$item->name}}</span></div></li>@endforeach</ul><div class='d-none flex-row justify-content-center align-items-center py-3'><span style='font-weight: 600; color: #94a3b8;'>No item found!</span></div><div data-bs-toggle='modal' data-bs-target='#verticalycentered' class='d-flex flex-row justify-content-center align-items-center py-2' style='background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;'><i class='bi bi-plus-circle text-primary' style='padding-right: 5px;'></i><span class='text-primary'>Add New Item</span></div></div></td>";
        cell1.style.position = 'relative';
        cell1.innerHTML = "<input type='text' class='form-control' id='itemInput"+row.rowIndex+"' onkeyup='searchItem("+row.rowIndex+")' placeholder='' title='Type in a name' onclick='openItemBox("+row.rowIndex+")'><div id='itemBox"+row.rowIndex+"' class='item-box'><ul id='item-ul-"+row.rowIndex+"' class='item-ul scroll-area' style='max-height: 200px; overflow-y: scroll;'>@foreach($items as $item)<li onclick='selectItem({{$loop->index}},"+row.rowIndex+")'><div class='d-flex flex-row justify-content-between align-items-center'><span style='font-weight: 600;'>{{$item->name}}</span></div></li>@endforeach</ul><div class='d-none flex-row justify-content-center align-items-center py-3'><span style='font-weight: 600; color: #94a3b8;'>No item found!</span></div><div data-bs-toggle='modal' data-bs-target='#verticalycentered' class='d-flex flex-row justify-content-center align-items-center py-2' style='background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;'><i class='bi bi-plus-circle text-primary' style='padding-right: 5px;'></i><span class='text-primary'>Add New Item</span></div></div>";
        cell2.innerHTML = "<td><input type='text' class='form-control'></td>"
        cell3.innerHTML = "<td><input type='text' class='form-control'></td>"
        cell4.innerHTML = "<td> $ 0.00 </td>"
        cell5.innerHTML = "<td><input type='checkbox' class='form-check-input' id='exampleCheck1'><label class='form-check-label' for='exampleCheck1'>(9%)</label><span>$ 0.00</span></td>"
        cell6.innerHTML = "<td><input type='checkbox' class='form-check-input' id='exampleCheck1'><label class='form-check-label' for='exampleCheck1'>(9%)</label><span>$ 0.00</span></td>"
        cell7.innerHTML = "<td><input type='checkbox' class='form-check-input' id='exampleCheck1'><label class='form-check-label' for='exampleCheck1'>(9%)</label><span>$ 0.00</span></td>"
        cell8.innerHTML = "<td> $ 0.00 </td>"
        cell9.innerHTML = "<i class='bi bi-trash' style='cursor :pointer;' onclick='deleteRow(" + row.rowIndex + ")'></i>";
    }

    const deleteRow = (index) => {
        var table = document.querySelector(".items-table");
        table.deleteRow(index);

        var tbody = table.getElementsByTagName("tbody")[0];
        var rows = tbody.getElementsByTagName("tr");
        // console.log(rows);
        var i = 1;
        for (i = 0; i < rows.length; i++) {
            var deleteTableCell = rows[i + 1].getElementsByTagName("td")[8];
            var itemTableCell = rows[i + 1].getElementsByTagName("td")[0];
            var inputData = itemTableCell.getElementsByTagName("input")[0].value;
            console.log(inputData);
            // console.log(i + 2);
            var newIndex = i + 2;
            deleteTableCell.innerHTML = "<i class='bi bi-trash' style='cursor :pointer;' onclick='deleteRow(" + newIndex + ")'></i>";
            itemTableCell.innerHTML = "<td style='position: relative;'><input type='text' class='form-control' id='itemInput"+newIndex+"' onkeyup='searchItem("+newIndex+")' placeholder='' title='Type in a name' onclick='openItemBox("+newIndex+")'><div id='itemBox"+newIndex+"' class='item-box'><ul id='item-ul-"+newIndex+"' class='item-ul scroll-area' style='max-height: 200px; overflow-y: scroll;'>@foreach($items as $item)<li onclick='selectItem({{$loop->index}},"+newIndex+")'><div class='d-flex flex-row justify-content-between align-items-center'><span style='font-weight: 600;'>{{$item->name}}</span></div></li>@endforeach</ul><div class='d-none flex-row justify-content-center align-items-center py-3'><span style='font-weight: 600; color: #94a3b8;'>No item found!</span></div><div data-bs-toggle='modal' data-bs-target='#verticalycentered' class='d-flex flex-row justify-content-center align-items-center py-2' style='background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;'><i class='bi bi-plus-circle text-primary' style='padding-right: 5px;'></i><span class='text-primary'>Add New Item</span></div></div></td>";
            
            itemTableCell.getElementsByTagName("input")[0].value = inputData;
        }
    }

    function myFunction1() {
        var input, filter, ul, li, a, div1, div, i, txtValue;
        input = document.getElementById("myInput1");
        filter = input.value.toUpperCase();
        ul = document.querySelector(".customer-ul");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            div1 = li[i].getElementsByTagName("div")[0];
            div = div1.getElementsByTagName("div")[1];
            a = div.getElementsByTagName("span")[0];
            // a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    function myFunction2() {
        var input, filter, ul, li, a, div, i, txtValue;
        input = document.getElementById("myInput2");
        filter = input.value.toUpperCase();
        ul = document.querySelector(".tax-ul");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            div = li[i].getElementsByTagName("div")[0];
            a = div.getElementsByTagName("span")[0];
            // a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    function searchItem(row) {
        var input, filter, ul, li, a, div, i, txtValue;
        input = document.getElementById("itemInput"+row);
        filter = input.value.toUpperCase();
        ul = document.getElementById("item-ul-"+row);
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            div = li[i].getElementsByTagName("div")[0];
            a = div.getElementsByTagName("span")[0];
            // a = li[i];
            // a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

</script>
@endsection