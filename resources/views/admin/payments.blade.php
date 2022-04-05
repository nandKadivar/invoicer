@extends('layouts.admin');

@section('title')
Invoicer - Payments
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
            <a class="nav-link" href="{{route('admin.payments')}}">
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
      <h1>Payments</h1>
      <nav class="d-flex flex-row justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Payments</li>
          <!-- <li class="breadcrumb-item active">Contact</li> -->
        </ol>
        <a type="button" class="btn btn-primary" href="{{route('admin.payments.create')}}">
          <i class="bi bi-plus-lg"></i>
          New Payment
        </a>
      </nav>
    </div><!-- End Page Title -->
    <div class="col-12">
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

        <div class="card-body">
          <!-- <h5 class="card-title">Due Invoices</h5> -->

          <table class="table table-borderless datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Payment Number</th>
                <th scope="col">Customer</th>
                <th scope="col">Payment Mode</th>
                <th scope="col">Invoice Number</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"><a href="#">#1</a></th>
                <td>12 Feb 2022</td>
                <td><a href="#" class="text-primary">PAY-00001</a></td>
                <td>Patel Steels Limited</td>
                <td>Cash</td>
                <td>INV-00001</td>
                <td><i class="fa fa-rupee"></i>&nbsp19999</td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#1</a></th>
                <td>12 Feb 2022</td>
                <td><a href="#" class="text-primary">PAY-00001</a></td>
                <td>Patel Steels Limited</td>
                <td>Cash</td>
                <td>INV-00001</td>
                <td><i class="fa fa-rupee"></i>&nbsp19999</td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#1</a></th>
                <td>16 Feb 2022</td>
                <td><a href="#" class="text-primary">PAY-00001</a></td>
                <td>Patel Steels Limited</td>
                <td>Cash</td>
                <td>INV-00001</td>
                <td><i class="fa fa-rupee"></i>&nbsp19999</td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#1</a></th>
                <td>21 Feb 2022</td>
                <td><a href="#" class="text-primary">PAY-00001</a></td>
                <td>Patel Steels Limited</td>
                <td>Cash</td>
                <td>INV-00001</td>
                <td><i class="fa fa-rupee"></i>&nbsp19999</td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#1</a></th>
                <td>18 Feb 2022</td>
                <td><a href="#" class="text-primary">PAY-00001</a></td>
                <td>Patel Steels Limited</td>
                <td>Cash</td>
                <td>INV-00001</td>
                <td><i class="fa fa-rupee"></i>&nbsp19999</td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#1</a></th>
                <td>17 Feb 2022</td>
                <td><a href="#" class="text-primary">PAY-00001</a></td>
                <td>Patel Steels Limited</td>
                <td>Cash</td>
                <td>INV-00001</td>
                <td><i class="fa fa-rupee"></i>&nbsp19999</td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#1</a></th>
                <td>20 Feb 2022</td>
                <td><a href="#" class="text-primary">PAY-00001</a></td>
                <td>Patel Steels Limited</td>
                <td>Cash</td>
                <td>INV-00001</td>
                <td><i class="fa fa-rupee"></i>&nbsp19999</td>
              </tr>

            </tbody>
          </table>

        </div>

      </div>
    </div>

  </main><!-- End #main -->
@endsection