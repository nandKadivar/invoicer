@extends('layouts.admin');

@section('title')
Invoicer - View Customer
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
<main id="main" class="main" style="padding: 0;">

    <section class="section profile" style="margin-top: -24px; over-flow: hidden;">
      <div class="d-flex flex-row justify-content-between">
        <div class="col-xl-3 mt-0 customer-panel card p-0" style="overflow-y: auto; height: 92vh; border-radius: 0px;">
          @foreach($customers as $customer)
            <div id="customer-view-{{$customer->id}}" class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important; cursor: pointer;" onclick="customerSelect('{{$customer->id}}')">
              <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">{{$customer->name}}</p>
                <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">{{$customer->contact_name}}</span>
              </div>
              <div>
                <span style="font-weight: 650;">
                  @php
                    $total = 0.0;
                    foreach($customer->invoices as $invoice){
                        $total =  $total + (float)($invoice->due_amount);
                    }
                    echo $customer->currency->symbol." ".$total;
                  @endphp
                </span>
              </div>
            </div>
          @endforeach
          {{-- <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between active-view customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600" style="font-size: 12px; font-weight: 600; color: #475569;">Meet Kadivar</span>
            </div>
            <div>
              <span style="font-weight: 650;">₹ 15,074.20</span>
            </div>
          </div> --}}
          <!-- </a> -->


          <!-- <a aria-current="page" href="/admin/customers/1/view" class="active router-link-exact-active flex justify-between p-4 items-center cursor-pointer hover:bg-gray-100 border-l-4 border-transparent bg-gray-100 border-primary-500 border-solid shake" id="customer-1" style="border-top: 1px solid rgba(185, 193, 209, 0.41);"><div><div title="Patel Steels Limited" class="pr-2 text-sm not-italic font-normal leading-5 text-black capitalize truncate">Patel Steels Limited</div><div title="Meet Kadivar" class="mt-1 text-xs not-italic font-medium leading-5 text-gray-600">Meet Kadivar</div></div><div class="flex-1 font-bold text-right whitespace-nowrap"><span style="font-family: sans-serif;">₹ 15,074.20</span></div></a> -->

        </div>

        <div class="col-xl-9 customer-panel card p-4" style="overflow-y: auto;height: 92vh; background-color: transparent; box-shadow: none;">
          <div class="col-xl-12 d-flex flex-row align-items-center justify-content-end">
            <button class="btn btn-outline-primary" style="margin-right: 10px;">
              Edit
            </button>
            <button class="btn btn-primary" style="margin-right: 10px;">
              New Transcation
            </button>
            <div class="filter d-flex flex-row align-items-center justify-content-end">
                <button class="btn btn-primary" data-bs-toggle="dropdown" style="height: 37px;"><i class="bi bi-three-dots" style="color: #fff"></i></button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li style="cursor: pointer;"><a class="dropdown-item"><i class="bi bi-pencil"></i> Edit</a></li>
                    <li style="cursor: pointer;"><a class="dropdown-item"><i class="bi bi-trash"></i> Delete</a></li>
                </ul>
            </div>
          </div>

          @php
            $sales = 0.00;
            $temp_sales = 0.0;
            $temp_receipts = 0.0;
            $sales_array = [];
            $receipts_array = [];
            $receipts = 0.0;
            $expenses = 0.0;
            $incomes = 0.0;
            $duration = '';
            $i = 0;
            foreach($selectedCustomer->invoices as $invoice){
              $month = date("M", strtotime($invoice->invoice_date));
              $year = date("Y", strtotime($invoice->invoice_date));
              // $duration = $month."-".$year;
              // echo $duration;
              if($duration != $month."-".$year && $i!=0){
                $sales_array[$month."-".$year] = $temp_sales;
                $receipts_array[$month."-".$year] = $temp_receipts;
                $temp_sales = 0;
                $temp_receipts = 0;
              }
              // echo $invoice->total;
              $sales =  $sales + (float)($invoice->total);
              $temp_sales =  $temp_sales + (float)($invoice->total);
              $receipts =  $receipts + (float)($invoice->due_amount);
              $temp_receipts =  $temp_receipts + (float)($invoice->due_amount);

              $duration = $month."-".$year;
              $i++;
            }

            $sales_array[$month."-".$year] = $temp_sales;
            $receipts_array[$month."-".$year] = $temp_receipts;

            // print_r($sales_array);
          @endphp

          <div class="col-12 mt-3">
              <div class="card d-flex flex-column align-items-center justify-content-between">
                  <div class="col-12 d-flex flex-row align-items-center justify-content-between">  
                    <div class="col-10">
                        
                        <div class="filter d-flex flex-row align-items-center justify-content-end mt-3">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots" style="color: #64748b"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item">Today</a></li>
                                <li><a class="dropdown-item">This Month</a></li>
                                <li><a class="dropdown-item">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Reports</h5>

                            <div id="reportsChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                  var sales = {!! json_encode($sales_array) !!};
                                  var receipts = {!! json_encode($receipts_array) !!};
                                  console.log(sales);
                                  console.log(receipts);
                                    
                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: [{
                                            name: 'Sales',
                                            data: [
                                              sales['Jan-2022'] ? sales['Jan-2022'].toFixed(2) : 0.0,
                                              sales['Feb-2022'] ? sales['Feb-2022'].toFixed(2) : 0.0,
                                              sales['Mar-2022'] ? sales['Mar-2022'].toFixed(2) : 0.0,
                                              sales['Apr-2022'] ? sales['Apr-2022'].toFixed(2) : 0.0,
                                              sales['May-2022'] ? sales['May-2022'].toFixed(2) : 0.0,
                                              sales['Jun-2022'] ? sales['Jun-2022'].toFixed(2) : 0.0,
                                              sales['Jul-2022'] ? sales['Jul-2022'].toFixed(2) : 0.0, 
                                              sales['Aug-2022'] ? sales['Aug-2022'].toFixed(2) : 0.0,
                                              sales['Sep-2022'] ? sales['Sep-2022'].toFixed(2) : 0.0,
                                              sales['Oct-2022'] ? sales['Oct-2022'].toFixed(2) : 0.0,
                                              sales['Nov-2022'] ? sales['Nov-2022'].toFixed(2) : 0.0,
                                              sales['Dec-2022'] ? sales['Des-2022'].toFixed(2) : 0.0
                                            ],
                                            // data: [sales['Jan-2022'],sales['Feb-2022'], sales['March-2022'], sales['April-2022'], sales['May-2022'], sales['Jun-2022'], sales['July-2022']],
                                        }, {
                                            name: 'Revenue',
                                            data: [11, 32, 45, 32, 34, 52, 41]
                                        }, {
                                            name: 'Customers',
                                            // data: [15, 11, 32, 18, 9, 24, 11]
                                            data: [
                                              receipts['Jan-2022'] ? receipts['Jan-2022'].toFixed(2) : 0.0,
                                              receipts['Feb-2022'] ? receipts['Feb-2022'].toFixed(2) : 0.0,
                                              receipts['Mar-2022'] ? receipts['Mar-2022'].toFixed(2) : 0.0,
                                              receipts['Apr-2022'] ? receipts['Apr-2022'].toFixed(2) : 0.0,
                                              receipts['May-2022'] ? receipts['May-2022'].toFixed(2) : 0.0,
                                              receipts['Jun-2022'] ? receipts['Jun-2022'].toFixed(2) : 0.0,
                                              receipts['Jul-2022'] ? receipts['Jul-2022'].toFixed(2) : 0.0, 
                                              receipts['Aug-2022'] ? receipts['Aug-2022'].toFixed(2) : 0.0,
                                              receipts['Sep-2022'] ? receipts['Sep-2022'].toFixed(2) : 0.0,
                                              receipts['Oct-2022'] ? receipts['Oct-2022'].toFixed(2) : 0.0,
                                              receipts['Nov-2022'] ? receipts['Nov-2022'].toFixed(2) : 0.0,
                                              receipts['Dec-2022'] ? receipts['Des-2022'].toFixed(2) : 0.0
                                            ],
                                        }],
                                        chart: {
                                            height: 350,
                                            type: 'area',
                                            toolbar: {
                                                show: false
                                            },
                                        },
                                        markers: {
                                            size: 4
                                        },
                                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.3,
                                                opacityTo: 0.4,
                                                stops: [0, 90, 100]
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            curve: 'smooth',
                                            width: 2
                                        },
                                        xaxis: {
                                            type: 'date',
                                            // type: 'datetime',
                                            // categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                            categories: ["Jan-2022", "Feb-2022", "Mar-2022", "Apr-2022", "May-2022", "Jun-2022", "Jul-2022", "Aug-2022", "Sept-2022", "Oct-2022", "Nov-2022", "Dec-2022"]
                                        },
                                        tooltip: {
                                            x: {
                                                format: 'M-yyyy'
                                            },
                                        }
                                    }).render();
                                });
                            </script>

                        </div>
                    
                    </div>

                    <div class="col-2 d-flex flex-column align-items-end justify-content-center card-body mt-3">
                        <div class="d-flex flex-column align-items-end">
                            <span style="color: #64748b;font-size: 14px;font-weight: 400;">Sales</span>
                            <h5 class="card-title text-primary sale">
                              @php
                                echo $selectedCustomer->currency->symbol." ".$sales;
                              @endphp
                            </h5>
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            <span style="color: #64748b;font-size: 14px;font-weight: 400;">Receipts</span>
                            <h5 class="card-title text-warning receipt">
                              @php
                                // $total = 0.0;
                                // foreach($selectedCustomer->invoices as $invoice){
                                //     $total =  $total + (float)($invoice->due_amount);
                                // }
                                echo $selectedCustomer->currency->symbol." ".$receipts;
                              @endphp
                            </h5>
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            <span style="color: #64748b;font-size: 14px;font-weight: 400;">Expenses</span>
                            <h5 class="card-title text-danger expense">$ 700.00</h5>
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            <span style="color: #64748b;font-size: 14px;font-weight: 400;">Net Income</span>
                            <h5 class="card-title text-success income">$ 14,374.20 </h5>
                        </div>
                    </div>
                  </div>

                  <div class="col-11">
                    <hr/>
                  </div>

                  <div class="col-12 d-flex flex-row align-items-center justify-content-between">  
                    <div class="card-body">
                      <h5 class="card-title">Basic info</h5>

                      <div class="col-12 d-flex flex-row align-items-center justify-content-between flex-wrap">
                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Dispay Name</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->name}}</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Primary Contact Name</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->contact_name}}</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Email</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->email}}</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Currency</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->currency->name}} ({{$selectedCustomer->currency->symbol}})</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Phone Number</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->phone}}</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Website</span>
                          
                          @if (isset($selectedCustomer->website))
                            <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->website}}</span>
                          @else
                            <span style="color: #040405;font-size: 14px;font-weight: 600;">NA</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 d-flex flex-row align-items-center justify-content-between">  
                    <div class="card-body">
                      <h5 class="card-title">Address</h5>

                      <div class="col-12 d-flex flex-row align-items-center flex-wrap">
                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Billing Address</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->billingAddress->address_street_1}}</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->billingAddress->address_street_2}}</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->billingAddress->city}}</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->billingAddress->state}}</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->billingAddress->country->name}}</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->billingAddress->zip}}</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Shipping Address</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->shippingAddress->address_street_1}}</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->shippingAddress->address_street_2}}</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->shippingAddress->city}}</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->shippingAddress->state}}</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->shippingAddress->country->name}}</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">{{$selectedCustomer->shippingAddress->zip}}</span>
                        </div>
                        <!-- <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #899bbd;font-size: 14px;font-weight: 400;">Primary Contact Name</span>
                          <span style="font-size: 16px;font-weight: 600;">Meet Kadivar</span>
                        </div> -->
                      </div>
                    </div>
                  </div>

              </div>
          </div>

        </div>
      </div>
    </section>

  </main>

  <script>
    // $(document).ready(function($){

      var url = window.location.href;
      var i = url.lastIndexOf('/');
      var id = url.substring(i+1);
      console.log(id);
      document.querySelector('#customer-view-'+id).classList.add('active-view');
      // var customers = {!! json_encode($customers) !!};
      // var initialCustomer = {!! json_encode($selectedCustomer) !!}
  
      const customerSelect = (newId) => {

        window.location.href = 'http://127.0.0.1:8000/admin/customers/'+newId;
        // const nextURL = 'http://127.0.0.1:8000/admin/customers/'+newId;
        // const nextTitle = 'My new page title';
        // const nextState = { additionalInformation: 'Updated the URL with JS' };

        // window.history.pushState(nextState, nextTitle, nextURL);

        // window.history.replaceState(nextState, nextTitle, nextURL);

        // customers.forEach(element => {
        //   if(element.id == newId){
        //     customer = element;
        //   }
        // });
  
        // document.querySelector('#customer-view-'+id).classList.remove('active-view');
        // document.querySelector('#customer-view-'+newId).classList.add('active-view');
        // // document.querySelector('#customer_id').innerHTML= invoice.invoice_number;
        
  
        // id = newId;
      }
    
  </script>
@endsection