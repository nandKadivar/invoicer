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
          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between active-view customer-view" style="padding-left: 20px !important;">
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
          </div>
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
                <button class="btn btn-primary" data-bs-toggle="dropdown" style="height: 37px;><i class="bi bi-three-dots" style="color: #fff"></i></button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    

                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Delete</a></li>
                </ul>
            </div>
          </div>

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

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Reports</h5>

                            <div id="reportsChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: [{
                                            name: 'Sales',
                                            data: [31, 40, 28, 51, 42, 82, 56],
                                        }, {
                                            name: 'Revenue',
                                            data: [11, 32, 45, 32, 34, 52, 41]
                                        }, {
                                            name: 'Customers',
                                            data: [15, 11, 32, 18, 9, 24, 11]
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
                                            type: 'datetime',
                                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                        },
                                        tooltip: {
                                            x: {
                                                format: 'dd/MM/yy HH:mm'
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
                            <h5 class="card-title text-primary">$ 30,148.40 </h5>
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            <span style="color: #64748b;font-size: 14px;font-weight: 400;">Receipts</span>
                            <h5 class="card-title text-warning">$ 15,074.20 </h5>
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            <span style="color: #64748b;font-size: 14px;font-weight: 400;">Expenses</span>
                            <h5 class="card-title text-danger">$ 700.00</h5>
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            <span style="color: #64748b;font-size: 14px;font-weight: 400;">Net Income</span>
                            <h5 class="card-title text-success">$ 14,374.20 </h5>
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
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">Patel Steels Limited</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Primary Contact Name</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">Meet Kadivar</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Email</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">kadivarmeet7708@gmail.com</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Currency</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">INR (₹)</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Phone Number</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">9452361425</span>
                        </div>

                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Website</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">NA</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 d-flex flex-row align-items-center justify-content-between">  
                    <div class="card-body">
                      <h5 class="card-title">Address</h5>

                      <div class="col-12 d-flex flex-row align-items-center justify-content-between flex-wrap">
                        <div class="col-4 d-flex flex-column mb-4">
                          <span style="color: #64748b;font-size: 14px;font-weight: 400;">Billing Address</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">221B Baker Street,</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">Ahmedabad,</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">Gujarat,</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">India,</span>
                          <span style="color: #040405;font-size: 14px;font-weight: 600;">360530.</span>
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
@endsection