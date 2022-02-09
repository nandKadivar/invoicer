@extends('layouts.admin');

@section('title')
Invoicer - Customers
@endsection

@section('content')
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
                      <tr>
                          <th scope="row"><a href="#">#1</a></th>
                          <td><a href="#" class="text-primary">Patel Steels Limited</a><br/><span style="font-size:  14px;color: #94a3b8;">Meet Kadivar</span></td>
                          <td>9452361425</td>
                          <td>15,074.20</td>
                          <td>06 Feb 2022</td>
                      </tr>
                  </tbody>
              </table>

          </div>

      </div>
    </div>

  </main>
@endsection