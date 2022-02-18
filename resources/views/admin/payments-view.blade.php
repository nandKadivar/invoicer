@extends('layouts.admin');

@section('title')
Invoicer - View Invoice
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
<main id="main" class="main" style="padding: 0;">

    <section class="section profile" style="margin-top: -24px; over-flow: hidden;">
      <div class="d-flex flex-row justify-content-between">
        <div class="col-xl-3 mt-0 customer-panel card p-0" style="overflow-y: auto; height: 92vh; border-radius: 0px;">
          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between active-view customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
              <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
            </div>
            <div class="d-flex flex-column align-items-end">
              <span style="font-weight: 650;">₹ 15,074.20</span>
              <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
            </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>

          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" style="padding-left: 20px !important;">
            <div class="d-flex flex-column">
                <p class="mb-1" style="font-size: 14px; color: #040405">Patel Steels Limited</p>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">INV-000002</span>
              </div>
              <div class="d-flex flex-column align-items-end">
                <span style="font-weight: 650;">₹ 15,074.20</span>
                <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">17 Feb 2022</span>
              </div>
          </div>
          <!-- </a> -->


          <!-- <a aria-current="page" href="/admin/customers/1/view" class="active router-link-exact-active flex justify-between p-4 items-center cursor-pointer hover:bg-gray-100 border-l-4 border-transparent bg-gray-100 border-primary-500 border-solid shake" id="customer-1" style="border-top: 1px solid rgba(185, 193, 209, 0.41);"><div><div title="Patel Steels Limited" class="pr-2 text-sm not-italic font-normal leading-5 text-black capitalize truncate">Patel Steels Limited</div><div title="Meet Kadivar" class="mt-1 text-xs not-italic font-medium leading-5 text-gray-600">Meet Kadivar</div></div><div class="flex-1 font-bold text-right whitespace-nowrap"><span style="font-family: sans-serif;">₹ 15,074.20</span></div></a> -->

        </div>

        <div class="col-xl-9 customer-panel card p-4" style="overflow-y: auto;height: 92vh; background-color: transparent; box-shadow: none;">
          <div class="col-xl-12 d-flex flex-row align-items-center justify-content-end">
            <button class="btn btn-outline-primary" style="margin-right: 10px; font-size:">
                Edit
              </button>
            <button class="btn btn-primary" style="margin-right: 10px;">
              Send Payment Receipt
            </button>
            <div class="filter d-flex flex-row align-items-center justify-content-end">
                <button class="btn btn-primary" data-bs-toggle="dropdown" style="height: 37px;"><i class="bi bi-three-dots" style="color: #fff;"></i></button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-link-45deg"></i> Copy PDF Url</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Delete</a></li>
                </ul>
            </div>
          </div>

          <div class="col-12 mt-1">
              <h5 class="card-title">INV-000002</h5>
                <iframe src="{{asset('./Payment Status.pdf')}}" style="width: 100%; height: 70vh; border-radius: 5px;"></iframe>        
          </div>

        </div>
      </div>
    </section>

  </main>

@endsection