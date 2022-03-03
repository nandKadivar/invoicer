@extends('layouts.admin');

@section('title')
Invoicer - Expenses
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
            <a class="nav-link collapsed" href="{{route('admin.invoices')}}">
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
            <a class="nav-link" href="{{route('admin.expenses')}}">
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
      <h1>New Expense</h1>
      <nav class="d-flex flex-row justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Expenses</li>
          <li class="breadcrumb-item active">New Expense</li>
          <!-- <li class="breadcrumb-item active">Contact</li> -->
        </ol>
        <!-- <a type="button" class="btn btn-primary" href="pages-customer-create.html">
          <i class="bi bi-plus-lg"></i>
          <i class="bi bi-download"></i>
          Save Payment
        </a> -->
      </nav>
    </div><!-- End Page Title -->
    <div class="col-12" >
      <div class="card recent-sales overflow-auto">

        <!-- <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
          </div> -->

          <div class="card" style="margin-bottom: 0px;">
            <div class="card-body">
              <h5 class="card-title">New Expense</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Category</label>
                  <select id="inputState" class="form-select">
                    <option value="">Select a Category</option>
                    <option>Transport</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Date</label>
                  <input type="date" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Amount</label>
                  <input type="number" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Currency</label>
                  <select id="inputState" class="form-select">
                    <option selected>INR - Indian Ruppee</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Customer</label>
                  <select id="inputState" class="form-select">
                    <option>Indian Spices Ltd</option>
                    <option>Hari Krishna Exports</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Payment Mode</label>
                  <select id="inputState" class="form-select">
                    <option selected>Select Payment mode</option>
                    <option>Cash</option>
                    <option>Cheque</option>
                    <option>Netbanking</option>
                  </select>
                </div>

                <div class="col-md-12">
                <span style="font-weight: 600;">Notes</span>
                    <div id="editor" style="background-color: #fff; border-radius: 5px; border: 1px solid #ececec;">
                        <!-- <p>This is some sample content.</p> -->
                    </div>
                </div>

                <div class="col-mb-6">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                    <input class="form-control" type="file" id="formFile">
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

      </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js "></script>
    <script>

        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

  </main><!-- End #main -->
@endsection