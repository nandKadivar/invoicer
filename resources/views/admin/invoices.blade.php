@extends('layouts.admin');

@section('title')
Invoicer - Invoices
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
      <h1>Invoices</h1>
      <nav class="d-flex flex-row justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Invoices</li>
        </ol>
        <a type="button" class="btn btn-primary" href="{{route('admin.invoices.create')}}">
          <i class="bi bi-plus-lg"></i>
          New Invoice
        </a>
      </nav>
    </div>
    <div class="col-12">
        <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#all">All</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#draft">Draft</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#due">Due</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sent">Sent</button>
            </li>
            
        </ul>

        <div class="tab-content">
            <div class="card recent-sales overflow-auto tab-pane fade show active all" id="all">
                <div class="card-body">
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount Due</th>
                                {{-- <th></th> --}}
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <th scope="row"><a href="/admin/invoices/view/{{$invoice->id}}" class="text-primary">#{{$invoice->invoice_number}}</a></th>
                                    <td>{{$invoice->formatted_invoice_date}}</td>
                                    <td>{{$invoice->customer->name}}</td>
                                    <td>
                                        @if($invoice->status == 'DRAFT')
                                            <span class="badge bg-warning">DRAFT</span> 
                                        @endif
                                        @if($invoice->status == 'SENT')
                                            <span class="badge bg-success">SENT</span> 
                                        @endif
                                        @if($invoice->paid_status == 'UNPAID')
                                            <span class="badge bg-warning">UNPAID</span> 
                                        @endif
                                        @if($invoice->paid_status == 'PARTIALLY_PAID')
                                            <span class="badge bg-primary">PARTIALLY PAID</span> 
                                        @endif
                                        @if($invoice->paid_status == 'PAID')
                                            <span class="badge bg-success">PAID</span> 
                                        @endif
                                    <td>{{$invoice->customer->currency->symbol}} {{$invoice->due_amount}}</td>
                                    {{-- <td><span class="badge bg-warning">Unpaid</span></td> --}}
                                    <td>{{$invoice->customer->currency->symbol}} {{$invoice->total}}</td>
                                    <td>-</td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <th scope="row"><a href="{{route('admin.invoices.view')}}" class="text-primary">#INV-000002</a></th>
                                <td>13 Feb 2022</td>
                                <td>At praesentium minu</td>
                                <td><span class="badge bg-success">Sent</span> <span class="badge bg-warning">Unpaid</span></td>
                                <td>$64</td>
                                <td>$150</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="{{route('admin.invoices.view')}}" class="text-primary">#INV-000008</a></th>
                                <td>14 Feb 2022</td>
                                <td>Blanditiis dolor omnis similique</a></td>
                                <td><span class="badge bg-warning">Draft</span> <span class="badge bg-warning">Unpaid</span></td>
                                <td>$47</td>
                                <td>$240</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="{{route('admin.invoices.view')}}" class="text-primary">#INV-000011</a></th>
                                <td>14 Feb 2022</td>
                                <td>At recusandae consectetur</a></td>
                                <td><span class="badge bg-success">Sent</span> <span class="badge bg-primary">Partially paid</span></td>
                                <td>$25</td>
                                <td>$125</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="{{route('admin.invoices.view')}}" class="text-primary">#INV-000015</a></th>
                                <td>04 Mar 2022</td>
                                <td>Ut voluptatem id earum et</a></td>
                                <td><span class="badge bg-warning">Draft</span> <span class="badge bg-warning">Unpaid</span></td>
                                <td>$67</td>
                                <td>$514</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="{{route('admin.invoices.view')}}" class="text-primary">#INV-000021</a></th>
                                <td>10 Apr 2022</td>
                                <td>Sunt similique distinctio</a></td>
                                <td><span class="badge bg-success">Sent</span> <span class="badge bg-success">Paid</span></td>
                                <td>$0</td>
                                <td>$675</td>
                                <td>-</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
    
            </div>
            <div class="card recent-sales overflow-auto tab-pane fade" id="draft">
                <div class="card-body">
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount Due</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                @if($invoice->status == 'DRAFT')
                                    <tr>
                                        <th scope="row"><a href="/admin/invoices/view/{{$invoice->id}}" class="text-primary">#{{$invoice->invoice_number}}</a></th>
                                        <td>{{$invoice->formatted_invoice_date}}</td>
                                        <td>{{$invoice->customer->name}}</td>
                                        <td>
                                            
                                            <span class="badge bg-warning">DRAFT</span> 
                                            
                                            @if($invoice->paid_status == 'UNPAID')
                                                <span class="badge bg-warning">UNPAID</span> 
                                            @endif
                                            @if($invoice->paid_status == 'PARTIALLY_PAID')
                                                <span class="badge bg-primary">UNPAID</span> 
                                            @endif
                                            @if($invoice->paid_status == 'PAID')
                                                <span class="badge bg-success">PAID</span> 
                                            @endif
                                        <td>{{$invoice->customer->currency->symbol}} {{$invoice->due_amount}}</td>
                                        {{-- <td><span class="badge bg-warning">Unpaid</span></td> --}}
                                        <td>{{$invoice->customer->currency->symbol}} {{$invoice->total}}</td>
                                        <td>-</td>
                                    </tr>
                                @endif
                            @endforeach
                            {{-- <tr>
                                <th scope="row"><a href="" class="text-primary">#INV-000013</a></th>
                                <td>14 Feb 2022</td>
                                <td>Blanditiis dolor omnis similique</a></td>
                                <td><span class="badge bg-warning">Draft</span> <span class="badge bg-warning">Unpaid</span></td>
                                <td>$47</td>
                                <td>$240</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="" class="text-primary">#INV-000015</a></th>
                                <td>04 Mar 2022</td>
                                <td>Ut voluptatem id earum et</a></td>
                                <td><span class="badge bg-warning">Draft</span> <span class="badge bg-warning">Unpaid</span></td>
                                <td>$67</td>
                                <td>$514</td>
                                <td>-</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
    
            </div>
            <div class="card recent-sales overflow-auto tab-pane fade" id="due">
                <div class="card-body">
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount Due</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice) 
                                @if(strtotime($invoice->due_date) < strtotime(date('Y-m-d')))
                                    <tr>
                                        <th scope="row"><a href="/admin/invoices/view/{{$invoice->id}}" class="text-primary">#{{$invoice->invoice_number}}</a></th>
                                        <td>{{$invoice->formatted_invoice_date}}</td>
                                        <td>{{$invoice->customer->name}}</td>
                                        <td>
                                            @if($invoice->status == 'DRAFT')
                                                <span class="badge bg-warning">DRAFT</span> 
                                            @endif
                                            @if($invoice->status == 'SENT')
                                                <span class="badge bg-success">SENT</span> 
                                            @endif
                                            @if($invoice->paid_status == 'UNPAID')
                                                <span class="badge bg-warning">UNPAID</span> 
                                            @endif
                                            @if($invoice->paid_status == 'PARTIALLY_PAID')
                                                <span class="badge bg-primary">UNPAID</span> 
                                            @endif
                                            @if($invoice->paid_status == 'PAID')
                                                <span class="badge bg-success">PAID</span> 
                                            @endif
                                        <td>{{$invoice->customer->currency->symbol}} {{$invoice->due_amount}}</td>
                                        {{-- <td><span class="badge bg-warning">Unpaid</span></td> --}}
                                        <td>{{$invoice->customer->currency->symbol}} {{$invoice->total}}</td>
                                        <td>-</td>
                                    </tr>
                                @endif
                            @endforeach
                            {{-- <tr>
                                <th scope="row"><a href="" class="text-primary">#INV-000002</a></th>
                                <td>13 Feb 2022</td>
                                <td>At praesentium minu</td>
                                <td><span class="badge bg-success">Sent</span> <span class="badge bg-warning">Unpaid</span></td>
                                <td>$64</td>
                                <td>$150</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="" class="text-primary">#INV-000011</a></th>
                                <td>14 Feb 2022</td>
                                <td>At recusandae consectetur</a></td>
                                <td><span class="badge bg-success">Sent</span> <span class="badge bg-primary">Partially paid</span></td>
                                <td>$25</td>
                                <td>$125</td>
                                <td>-</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
    
            </div>
            <div class="card recent-sales overflow-auto tab-pane fade" id="sent">
                <div class="card-body">
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount Due</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><a href="" class="text-primary">#INV-000002</a></th>
                                <td>13 Feb 2022</td>
                                <td>At praesentium minu</td>
                                <td><span class="badge bg-success">Sent</span> <span class="badge bg-warning">Unpaid</span></td>
                                <td>$64</td>
                                <td>$150</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="" class="text-primary">#INV-000011</a></th>
                                <td>14 Feb 2022</td>
                                <td>At recusandae consectetur</a></td>
                                <td><span class="badge bg-success">Sent</span> <span class="badge bg-primary">Partially paid</span></td>
                                <td>$25</td>
                                <td>$125</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="" class="text-primary">#INV-000021</a></th>
                                <td>10 Apr 2022</td>
                                <td>Sunt similique distinctio</a></td>
                                <td><span class="badge bg-success">Sent</span> <span class="badge bg-success">Paid</span></td>
                                <td>$0</td>
                                <td>$675</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    
            </div>
        </div>
    </div>

  </main>
@endsection