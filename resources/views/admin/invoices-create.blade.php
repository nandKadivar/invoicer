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
                <div class="col-12 d-flex flex-row justify-content-center align-items-center" style="position: relative; height: 180px;background-color: #fff; border-radius: 5px; border: 1px solid #ececec; cursor: pointer;" onclick="openCustomerBox()">
                    <i class="bi bi-person-circle" style="font-size: 24px; margin-right: 10px;"></i><span style="font-size: 20px; font-weight: 520;">New Customer</span>
                    <div class="customer-box">
                        <input type="text" class="form-control" id="myInput1" onkeyup="myFunction1()" placeholder="Search" title="Type in a name">
                        <ul class="customer-ul">                            
                            <li>
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
                            </li>
                        </ul>
                        <!-- Customer not found warning Start-->
                        <div class="d-none flex-row justify-content-center align-items-center py-3">
                            <span style="font-weight: 600; color: #94a3b8;">No customer found!</span>
                        </div>
                        <!-- Customer not found warning End -->
                        <div class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;">
                            <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                            <span class="text-primary">Add New Customer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12 col-12 p-2 d-flex flex-column align-items-center justify-content-between" style="height: 180px;">
                <!-- <div class="row mb-12 d-flex flex-column"> -->
                <div class="col-12 d-flex flex-column">
                    <label for="inputEmail" class="col-form-label" style="padding-top: 0px;">Invoice Date</label>
                    <div class="col-12">
                        <input type="date" class="form-control">
                    </div>
                </div>

                <div class="col-12 d-flex flex-column">
                    <label for="inputEmail" class="col-form-label" style="padding-top: 0px;">Invoice Number</label>
                    <div class="col-12">
                        <input type="text" class="form-control" style="width: 100%">
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12 col-12 p-2 d-flex flex-column align-items-center justify-content-between" style="height: 180px;">
                <!-- <div class="row mb-12 d-flex flex-column"> -->
                <div class="col-12 d-flex flex-column">
                    <label for="inputEmail" class="col-form-label" style="padding-top: 0px;">Due Date</label>
                    <div class="col-12">
                        <input type="date" class="form-control" style="width: 100%">
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
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="position: relative;">
                            <input type="text" name="item1" list="items" class="form-control">
                            <datalist id="items">
                                <option value="Stones" style="background-color: #fff;">
                                <option value="Steel">
                                <option value="Cement">
                            </datalist>
                            <!-- <input type="text" class="form-control" id="myInput3" onkeyup="myFunction3()" placeholder="Search" title="Type in a name" onclick="openItemBox()"> -->
                            <!-- <div class="item-box">
                                <ul class="item-ul">
                                    <li>
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
                                    </li>
                                </ul>
                                <div class="d-none flex-row justify-content-center align-items-center py-3">
                                    <span style="font-weight: 600; color: #94a3b8;">No item found!</span>
                                </div>
                                <div data-bs-toggle="modal" data-bs-target="#verticalycentered" class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;">
                                    <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                                    <span class="text-primary">Add New Item</span>
                                </div>
                            </div> -->
                        </td>
                        <td><input type="number" name="price1" class="form-control"></td>
                        <td><input type="text" name="qty1" class="form-control"></td>
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
@endsection