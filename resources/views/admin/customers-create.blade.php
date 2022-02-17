@extends('layouts.admin');

@section('title')
Invoicer - New Customer
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
          <a class="nav-link" href="{{route('admin.customers')}}">
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
      <h1>Customers</h1>
      <nav class="d-flex flex-row justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('admin.customers')}}">Customers</a></li>
          <li class="breadcrumb-item active">New Customer</li>
        </ol>
      </nav>
    </div>
    <div class='col-md-12'>
      <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Basic info</h5>

              <form class="row g-3">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Display Name</label>
                  <input type="text" class="form-control" id="inputName5">
                </div>
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
                  <select id="inputState" class="form-select">
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

                <div class="col-md-12">
                  <hr/>
                </div>

                <div class="text-center">
                  <button type="button" class="btn btn-primary">
                    <i class="bi bi-download"></i>
                    Save Customer
                  </button>
                </div>
              </form>

            </div>
          </div>

        </div>
    </div>

  </main>
@endsection