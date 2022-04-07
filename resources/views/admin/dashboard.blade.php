@extends('layouts.admin');

@section('title')
Invoicer - Dashboard
@endsection

@section('content')
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.dashboard')}}">
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
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    @php
        $total_due_amount=0.0;
        // $total_total_amount=0.0;
        // $total_sales=0.0;
        // $total_receipts=0.0;
        // $total_expenses=0.0;
        // $net_income=0.0;


        $sales = 0.00;
        $receipts = 0.0;
        $expenses = 0.00;
        $temp_sales = 0.0;
        $temp_receipts = 0.0;
        $temp_expenses = 0.0;
        $sales_array = [];
        $receipts_array = [];
        $expenses_array = [];
        $incomes = 0.0;
        $duration = '';
        $i = 0;
        $month='';
        $year='';

        foreach ($invoices as $invoice) {
            $month = date("M", strtotime($invoice->invoice_date));
            $year = date("Y", strtotime($invoice->invoice_date));

            if($duration != $month."-".$year && $i!=0){
                $sales_array[$month."-".$year] = $temp_sales;
                $temp_sales = 0;
            }
            
            $sales =  $sales + (float)($invoice->base_total);
            $temp_sales =  $temp_sales + (float)($invoice->base_total);
            $total_due_amount = $total_due_amount + (float)($invoice->base_due_amount);

            $duration = $month."-".$year;
            $i++;
        }

        foreach ($payments as $payment) {
            $month = date("M", strtotime($payment->expense_date));
            $year = date("Y", strtotime($payment->expense_date));

            if($duration != $month."-".$year && $i!=0){
            $receipts_array[$month."-".$year] = $temp_receipts;
            $temp_receipts = 0;
            }
            
            $receipts =  $receipts + (float)($payment->base_amount);
            
            $temp_receipts =  $temp_receipts + (float)($payment->base_amount);

            $duration = $month."-".$year;
            $i++;

        }

        foreach ($all_expenses as $expense) {
            $month = date("M", strtotime($expense->expense_date));
            $year = date("Y", strtotime($expense->expense_date));

            if($duration != $month."-".$year && $i!=0){
            $expenses_array[$month."-".$year] = $temp_expenses;
            $temp_expenses = 0;
            }
            
            $expenses =  $expenses + (float)($expense->base_amount);
            
            $temp_expenses =  $temp_expenses + (float)($expense->base_amount);

            $duration = $month."-".$year;
            $i++;
        }

        $sales_array[$month."-".$year] = $temp_sales;
        $receipts_array[$month."-".$year] = $temp_receipts;
        $expenses_array[$month."-".$year] = $temp_expenses;
        
        $incomes = $receipts - $expenses;

    @endphp
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                <h5 class="card-title">Amount Due <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        {{-- <i class="bi bi-currency-dollar"></i> --}}
                                        ₹
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            @php
                                                echo $total_due_amount;
                                            @endphp
                                        </h6>
                                        <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                <h5 class="card-title">Invoices <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-receipt-cutoff"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            @php
                                                echo $invoices->count();
                                            @endphp
                                        </h6>
                                        <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                <h5 class="card-title">Customers <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            @php
                                                echo $customers->count();
                                            @endphp
                                        </h6>
                                        <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Customers Card -->

                    <div class="col-12">
                        <div class="card d-flex flex-row align-items-center justify-content-between">
                            <div class="col-10">
                                
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                    <h5 class="card-title">Reports <span>/Today</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            var sales = {!! json_encode($sales_array) !!};
                                            var receipts = {!! json_encode($receipts_array) !!};
                                            var expenses = {!! json_encode($expenses_array) !!};
                                            console.log(sales);
                                            console.log(receipts);
                                            console.log(expenses);

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
                                                },{
                                                    name: 'Receipts',
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
                                                },{
                                                    name: 'Expense',
                                                    data: [
                                                    expenses['Jan-2022']  ? expenses['Jan-2022'].toFixed(2) : 0.0,
                                                    expenses['Feb-2022']  ? expenses['Feb-2022'].toFixed(2) : 0.0,
                                                    expenses['Mar-2022']  ? expenses['Mar-2022'].toFixed(2) : 0.0,
                                                    expenses['Apr-2022']  ? expenses['Apr-2022'].toFixed(2) : 0.0,
                                                    expenses['May-2022']  ? expenses['May-2022'].toFixed(2) : 0.0,
                                                    expenses['Jun-2022']  ? expenses['Jun-2022'].toFixed(2) : 0.0,
                                                    expenses['Jul-2022']  ? expenses['Jul-2022'].toFixed(2) : 0.0, 
                                                    expenses['Aug-2022']  ? expenses['Aug-2022'].toFixed(2) : 0.0,
                                                    expenses['Sep-2022']  ? expenses['Sep-2022'].toFixed(2) : 0.0,
                                                    expenses['Oct-2022']  ? expenses['Oct-2022'].toFixed(2) : 0.0,
                                                    expenses['Nov-2022']  ? expenses['Nov-2022'].toFixed(2) : 0.0,
                                                    expenses['Dec-2022']  ? expenses['Dec-2022'].toFixed(2) : 0.0
                                                    ],
                                                },{
                                                    name: 'Income',
                                                    data: [
                                                    (receipts['Jan-2022'] && expenses['Jan-2022'])  ? (receipts['Jan-2022'] - expenses['Jan-2022']).toFixed(2) : 0.0,
                                                    (receipts['Feb-2022'] && expenses['Feb-2022'])  ? (receipts['Feb-2022'] - expenses['Feb-2022']).toFixed(2) : 0.0,
                                                    (receipts['Mar-2022'] && expenses['Mar-2022'])  ? (receipts['Mar-2022'] - expenses['Mar-2022']).toFixed(2) : 0.0,
                                                    (receipts['Apr-2022'] && expenses['Apr-2022'])  ? (receipts['Apr-2022'] - expenses['Apr-2022']).toFixed(2) : 0.0,
                                                    (receipts['May-2022'] && expenses['May-2022'])  ? (receipts['May-2022'] - expenses['May-2022']).toFixed(2) : 0.0,
                                                    (receipts['Jun-2022'] && expenses['Jun-2022'])  ? (receipts['Jun-2022'] - expenses['Jun-2022']).toFixed(2) : 0.0,
                                                    (receipts['Jul-2022'] && expenses['Jul-2022'])  ? (receipts['Jul-2022'] - expenses['Jul-2022']).toFixed(2) : 0.0, 
                                                    (receipts['Aug-2022'] && expenses['Aug-2022'])  ? (receipts['Aug-2022'] - expenses['Aug-2022']).toFixed(2) : 0.0,
                                                    (receipts['Sep-2022'] && expenses['Sep-2022'])  ? (receipts['Sep-2022'] - expenses['Sep-2022']).toFixed(2) : 0.0,
                                                    (receipts['Oct-2022'] && expenses['Oct-2022'])  ? (receipts['Oct-2022'] - expenses['Oct-2022']).toFixed(2) : 0.0,
                                                    (receipts['Nov-2022'] && expenses['Nov-2022'])  ? (receipts['Nov-2022'] - expenses['Nov-2022']).toFixed(2) : 0.0,
                                                    (receipts['Dec-2022'] && expenses['Dec-2022'])  ? (receipts['Dec-2022'] - expenses['Dec-2022']).toFixed(2) : 0.0
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
                                                colors: ['#4154f1', '#ff771d', '#dc3545', '#2eca6a'],
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
                                    <!-- End Line Chart -->

                                </div>
                            
                            </div>

                            <div class="col-2 d-flex flex-column align-items-end justify-content-center card-body mt-3">
                                <div class="d-flex flex-column align-items-end">
                                    <span style="color: #899bbd;font-size: 14px;font-weight: 400;">Sales</span>
                                    <h5 class="card-title text-primary">$ 30,148.40 </h5>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <span style="color: #899bbd;font-size: 14px;font-weight: 400;">Receipts</span>
                                    <h5 class="card-title text-warning">$ 15,074.20 </h5>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <span style="color: #899bbd;font-size: 14px;font-weight: 400;">Expenses</span>
                                    <h5 class="card-title text-danger">$ 700.00</h5>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <span style="color: #899bbd;font-size: 14px;font-weight: 400;">Net Income</span>
                                    <h5 class="card-title text-success">$ 14,374.20 </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Reports -->
                    <!-- </div> -->
                    
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                <h5 class="card-title">Due Invoices</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Due On</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="#">#INV-000002</a></th>
                                            <td>13 Feb 2022</td>
                                            <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                            <td>$64</td>
                                            <td><span class="badge bg-success">Sent</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#INV-000008</a></th>
                                            <td>14 Feb 2022</td>
                                            <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                                            <td>$47</td>
                                            <td><span class="badge bg-warning">Draft</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#INV-000011</a></th>
                                            <td>14 Feb 2022</td>
                                            <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                            <td>$147</td>
                                            <td><span class="badge bg-success">Sent</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#INV-000015</a></th>
                                            <td>04 Mar 2022</td>
                                            <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                            <td>$67</td>
                                            <td><span class="badge bg-warning">Draft</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#INV-000021</a></th>
                                            <td>10 Apr 2022</td>
                                            <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                            <td>$165</td>
                                            <td><span class="badge bg-success">Sent</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                    <!-- End Recent Sales -->
                    <!-- Recent Sales -->
                    <!-- <div class="col-6">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="#">#2457</a></th>
                                            <td>Brandon Jacob</td>
                                            <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                            <td>$64</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2147</a></th>
                                            <td>Bridie Kessler</td>
                                            <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                                            <td>$47</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2049</a></th>
                                            <td>Ashleigh Langosh</td>
                                            <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                            <td>$147</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2644</a></th>
                                            <td>Angus Grady</td>
                                            <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                            <td>$67</td>
                                            <td><span class="badge bg-danger">Rejected</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2644</a></th>
                                            <td>Raheem Lehner</td>
                                            <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                            <td>$165</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div> -->
                    <!-- End Recent Sales -->
                    <!-- Top Selling -->
                    <!-- <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Top Selling <span>| Today</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Preview</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Sold</th>
                                            <th scope="col">Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <a href="#"><img src="assets/img/product-1.jpg" alt=""></a>
                                            </th>
                                            <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                                            <td>$64</td>
                                            <td class="fw-bold">124</td>
                                            <td>$5,828</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <a href="#"><img src="assets/img/product-2.jpg" alt=""></a>
                                            </th>
                                            <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                                            <td>$46</td>
                                            <td class="fw-bold">98</td>
                                            <td>$4,508</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <a href="#"><img src="assets/img/product-3.jpg" alt=""></a>
                                            </th>
                                            <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                                            <td>$59</td>
                                            <td class="fw-bold">74</td>
                                            <td>$4,366</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <a href="#"><img src="assets/img/product-4.jpg" alt=""></a>
                                            </th>
                                            <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                                            <td>$32</td>
                                            <td class="fw-bold">63</td>
                                            <td>$2,016</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <a href="#"><img src="assets/img/product-5.jpg" alt=""></a>
                                            </th>
                                            <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                                            <td>$79</td>
                                            <td class="fw-bold">41</td>
                                            <td>$3,239</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div> -->
                    <!-- End Top Selling -->

                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            <!-- <div class="col-lg-4">

                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                        <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                        <div class="activity">

                            <div class="activity-item d-flex">
                                <div class="activite-label">32 min</div>
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <div class="activity-content">
                                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                                </div>
                            </div>

                            <div class="activity-item d-flex">
                                <div class="activite-label">56 min</div>
                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                <div class="activity-content">
                                    Voluptatem blanditiis blanditiis eveniet
                                </div>
                            </div>

                            <div class="activity-item d-flex">
                                <div class="activite-label">2 hrs</div>
                                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                <div class="activity-content">
                                    Voluptates corrupti molestias voluptatem
                                </div>
                            </div>

                            <div class="activity-item d-flex">
                                <div class="activite-label">1 day</div>
                                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                <div class="activity-content">
                                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                                </div>
                            </div>

                            <div class="activity-item d-flex">
                                <div class="activite-label">2 days</div>
                                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                <div class="activity-content">
                                    Est sit eum reiciendis exercitationem
                                </div>
                            </div>

                            <div class="activity-item d-flex">
                                <div class="activite-label">4 weeks</div>
                                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                <div class="activity-content">
                                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                \
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Budget Report <span>| This Month</span></h5>

                        <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                    legend: {
                                        data: ['Allocated Budget', 'Actual Spending']
                                    },
                                    radar: {
                                        // shape: 'circle',
                                        indicator: [{
                                            name: 'Sales',
                                            max: 6500
                                        }, {
                                            name: 'Administration',
                                            max: 16000
                                        }, {
                                            name: 'Information Technology',
                                            max: 30000
                                        }, {
                                            name: 'Customer Support',
                                            max: 38000
                                        }, {
                                            name: 'Development',
                                            max: 52000
                                        }, {
                                            name: 'Marketing',
                                            max: 25000
                                        }]
                                    },
                                    series: [{
                                        name: 'Budget vs spending',
                                        type: 'radar',
                                        data: [{
                                            value: [4200, 3000, 20000, 35000, 50000, 18000],
                                            name: 'Allocated Budget'
                                        }, {
                                            value: [5000, 14000, 28000, 26000, 42000, 21000],
                                            name: 'Actual Spending'
                                        }]
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div>

                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [{
                                            value: 1048,
                                            name: 'Search Engine'
                                        }, {
                                            value: 735,
                                            name: 'Direct'
                                        }, {
                                            value: 580,
                                            name: 'Email'
                                        }, {
                                            value: 484,
                                            name: 'Union Ads'
                                        }, {
                                            value: 300,
                                            name: 'Video Ads'
                                        }]
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div>

                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                        <div class="news">
                            <div class="post-item clearfix">
                                <img src="assets/img/news-1.jpg" alt="">
                                <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                                <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-2.jpg" alt="">
                                <h4><a href="#">Quidem autem et impedit</a></h4>
                                <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-3.jpg" alt="">
                                <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                                <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-4.jpg" alt="">
                                <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                                <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-5.jpg" alt="">
                                <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                                <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                            </div>

                        </div>

                    </div>
                </div>

            </div> -->
            <!-- End Right side columns -->

        </div>
    </section>

</main>
@endsection