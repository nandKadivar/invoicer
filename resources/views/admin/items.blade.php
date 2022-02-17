@extends('layouts.admin');

@section('title')
Invoicer - Items
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
            <a class="nav-link" href="{{route('admin.items')}}">
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
      <h1>Items</h1>
      <nav class="d-flex flex-row justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Items</li>
          <!-- <li class="breadcrumb-item active">Contact</li> -->
        </ol>
        <a type="button" class="btn btn-primary" href="{{route('admin.items.create')}}">
          <i class="bi bi-plus-lg"></i>
          Add Item
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
                          <th scope="col">Name</th>
                          <th scope="col">Unit</th>
                          <th scope="col">Price</th>
                          <th scope="col">Added On</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <th scope="row"><a href="#">#1</a></th>
                          <td><a href="{{route('admin.items.view')}}" class="text-primary">Stones</a></td>
                          <td>Kg</td>
                          <td>13.00</td>
                          <td>06 Feb 2022</td>
                      </tr>
                  </tbody>
              </table>

          </div>

      </div>
    </div>

  </main>
@endsection