@extends('layouts.admin');

@section('title')
Invoicer - Customers
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
          <li class="breadcrumb-item active">Customers</li>
        </ol>
        <a type="button" class="btn btn-primary" href="{{route('admin.customers.create')}}">
          <i class="bi bi-plus-lg"></i>
          New Customer
        </a>
      </nav>
    </div>
    <div class="col-12">
      <div class="card recent-sales overflow-auto">

          <div class="card-body">

              <table class="table table-borderless datatable">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Amount Due</th>
                          <th scope="col">Added On</th>
                      </tr>
                  </thead>
                  <tbody>
                      {{-- <tr>
                          <th scope="row"><a href="#">#1</a></th>
                          <td><a href="{{route('admin.customers.view')}}" class="text-primary">Patel Steels Limited</a><br/><span style="font-size:  14px;color: #94a3b8;">Meet Kadivar</span></td>
                          <td>9452361425</td>
                          <td>15,074.20</td>
                          <td>06 Feb 2022</td>
                      </tr> --}}
                      @foreach ($customers as $customer)
                        <tr>
                            <th scope="row"><a href="#">#{{$loop->iteration}}</a></th>
                            <td><a href="/admin/customers/{{$customer->id}}" class="text-primary">{{$customer->name}}</a><br/><span style="font-size:  14px;color: #94a3b8;">{{$customer->contact_name}}</span></td>
                            <td>{{$customer->phone}}</td>
                            <td>
                                @php
                                    $total = 0.0;
                                    foreach($customer->invoices as $invoice){
                                        $total =  $total + (float)($invoice->due_amount);
                                    }
                                    echo $customer->currency->symbol." ".$total;
                                @endphp
                            </td>
                            <td>{{$customer->formattedCreatedAt}}</td>
                        </tr>
                      @endforeach
                      {{-- @php
                        print_r($customers[0]->name);    
                      @endphp --}}
                  </tbody>
              </table>

          </div>

      </div>
    </div>

  </main>
@endsection