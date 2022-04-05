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
      <h1>New Payment</h1>
      <nav class="d-flex flex-row justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('admin.payments')}}">Payments</a></li>
          <li class="breadcrumb-item active">New Payment</li>
          <!-- <li class="breadcrumb-item active">Contact</li> -->
        </ol>
        <!-- <a type="button" class="btn btn-primary" href="pages-customer-create.html">
          <i class="bi bi-plus-lg"></i>
          <i class="bi bi-download"></i>
          Save Payment
        </a> -->
      </nav>
    </div><!-- End Page Title -->
    <div class="col-12" >
      <div class="card recent-sales overflow-auto">
          <div class="card" style="margin-bottom: 0px;">
            <div class="card-body">
              <h5 class="card-title">New Payment</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3 paymentForm">
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Date</label>
                  @php
                    echo '<input type="date" class="form-control" id="payment_date" name="payment_date" value="'.date("Y-m-d").'">';
                  @endphp
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Payment Number</label>
                  @php
                    echo '<input type="text" id="payment_number" class="form-control" style="width: 100%" disabled name="payment_number" value="PAY-'.rand(000001,999999).'">';
                  @endphp
                </div>
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Customer</label>
                  <input type="text" class="form-control" id="customerInput" onkeyup="searchCustomer()" placeholder="" title="Type in a name" onclick="openCustomerBox()">
                  <div style="position: relative;">
                    <div id="customerBox" class="select-customer-box">
                        <ul id="customer-ul" class="customer-ul scroll-area" style="max-height: 200px; overflow-y: scroll;">
                            @foreach($customers as $customer)
                                <li onclick="selectCustomer({{$loop->index}})" style="padding: 10px;">
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <span style="font-weight: 600;">{{$customer->name}}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-none flex-row justify-content-center align-items-center py-3">
                            <span style="font-weight: 600; color: #94a3b8;">No Customer found!</span>
                        </div>
                        <div data-bs-toggle="modal" data-bs-target="#verticalycentered" class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;">
                            <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                            <span class="text-primary">Add New Customer</span>
                        </div>
                    </div>
                  </div>
                  {{-- <select id="inputState" class="form-select">
                    <option value="">Click here to select customer</option>
                    <option>Customer 2</option>
                  </select> --}}
                </div>
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Invoice</label>
                  <input type="text" class="form-control" id="invoiceInput" onkeyup="searchInvoice()" placeholder="" title="Type in a name" onclick="openInvoiceBox()">
                  <div style="position: relative;">
                    <div id="invoiceBox" class="select-invoice-box">
                        <ul id="invoice-ul" class="invoice-ul scroll-area" style="max-height: 200px; overflow-y: scroll;">
                            
                        </ul>
                        <div class="d-none flex-row justify-content-center align-items-center py-3">
                            <span style="font-weight: 600; color: #94a3b8;">No Invoice found!</span>
                        </div>
                        <div data-bs-toggle="modal" data-bs-target="#verticalycentered" class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;">
                            <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                            <span class="text-primary">Add New Invoice</span>
                        </div>
                    </div>
                  </div>
                  {{-- <select id="inputState" class="form-select">
                    <option selected>Select Invoice</option>
                    <option>...</option>
                  </select> --}}
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Amount</label>
                  <input type="text" class="form-control" id="amount">
                </div>
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Payment Mode</label>
                  <input type="text" class="form-control" id="paymentModeInput" onkeyup="searchPaymentMode()" placeholder="" title="Type in a name" onclick="openPaymentModeBox()">
                  <div style="position: relative;">
                    <div id="paymentModeBox" class="select-payment-mode-box">
                        <ul id="paymentMode-ul" class="payment-mode-ul scroll-area" style="max-height: 200px; overflow-y: scroll;">
                            @foreach($paymentModes as $i)
                                <li onclick="selectPaymentMode({{$loop->index}})" style="padding: 10px;">
                                  <div class="d-flex flex-row justify-content-between align-items-center">
                                    <span style="font-weight: 600;">{{$i['name']}}</span>
                                  </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-none flex-row justify-content-center align-items-center py-3">
                            <span style="font-weight: 600; color: #94a3b8;">No Payment Method found!</span>
                        </div>
                        <div data-bs-toggle="modal" data-bs-target="#verticalycentered" class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;">
                            <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                            <span class="text-primary">Add New Payment method</span>
                        </div>
                    </div>
                  </div>
                  {{-- <select id="inputState" class="form-select">
                    <option selected>Select Payment mode</option>
                    <option>...</option>
                  </select> --}}
                </div>

                <div class="col-md-12">
                <span style="font-weight: 600;">Notes</span>
                    <div id="editor" style="background-color: #fff; border-radius: 5px; border: 1px solid #ececec;">
                        <!-- <p>This is some sample content.</p> -->
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-download"></i>
                        Save Payment
                    </button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

      </div>
    </div>

  </main><!-- End #main -->

  <script>
    var selectedCustomerIndex=0;
    var customers = {!! json_encode($customers) !!};
    var selectedCustomer;
    var customerSelected = false;
    var selectedInvoiceId;
    var selectedPaymentModeId = 1;
  
    const form = document.querySelector(".paymentForm");
    
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      
      const data = {
        payment_number: document.querySelector('#payment_number').value,
        payment_date: document.querySelector('#payment_date').value,
        notes: document.querySelector('.ck-content').innerHTML,
        amount: document.querySelector('#amount').value,
        invoice_id: selectedInvoiceId,
        company_id: 1,
        payment_method_id: selectedPaymentModeId
      };

      axios.post('http://127.0.0.1:8000/admin/payments/new', data, {
        headers: { 
        'Content-Type': 'application/json',
        // 'X-CSRF-TOKEN': token.content,
        'X-Requested-With': 'XMLHttpRequest',
        }
      }).then(function(res){
        const { payment, id } = res.data;
        // console.log(payment);
        window.location.href = "http://127.0.0.1:8000/admin/payments/view/"+id;
      });
    });

    const selectCustomer = (index) => {
      document.querySelector('#customerInput').value = customers[index].name;
      selectedCustomerIndex = index;
      selectedCustomer = customers[index];
      customerSelected = true;
      document.querySelector('#invoiceInput').value = '';
      document.querySelector('#amount').value = '';
      // changeInvoiceOptions();
      var invoices = selectedCustomer.invoices;
      console.log(invoices);
      var ul = document.getElementById('invoice-ul');
      var data = '';

      invoices.forEach(i => {
        data = data + '<li onclick="selectInvoice('+i.id+')" style="padding: 10px;"><div class="d-flex flex-row justify-content-between align-items-center"><span style="font-weight: 600;">'+i.invoice_number+'</span></div></li>'
      });

      ul.innerHTML = data;
    }

    const selectInvoice = (id) => {
      selectedInvoiceId = id;
      var invoices = {!! json_encode($invoices) !!};
      var index;
      invoices.forEach((i,count) => {
        if(i.id == id){
          index = count;
        }
      });
      document.querySelector('#invoiceInput').value = invoices[index].invoice_number;
      document.querySelector('#amount').value = invoices[index].due_amount;
    }

    const selectPaymentMode = (index) => {
      var paymentModes = {!! json_encode($paymentModes) !!};
      document.querySelector('#paymentModeInput').value = paymentModes[index].name;
      selectedPaymentModeId = paymentModes[index].id;

    }

    const openCustomerBox = () => {
      var customerBox = document.querySelector("#customerBox");
      customerBox.style.display = "flex";
    }

    const openInvoiceBox = () => {
      var invoiceBox = document.querySelector("#invoiceBox");
      invoiceBox.style.display = "flex";
    }

    const openPaymentModeBox = () => {
      var paymentModeBox = document.querySelector("#paymentModeBox");
      paymentModeBox.style.display = "flex";
    }

    function searchCustomer() {
      var input, filter, ul, li, a, div, i, txtValue;
      input = document.getElementById("customerInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("customer-ul");
      li = ul.getElementsByTagName("li");
      for (i = 0; i < li.length; i++) {
          div = li[i].getElementsByTagName("div")[0];
          a = div.getElementsByTagName("span")[0];
          txtValue = a.textContent || a.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
          } else {
              li[i].style.display = "none";
          }
      }
    }

    function searchInvoice() {
      var input, filter, ul, li, a, div, i, txtValue;
      input = document.getElementById("invoiceInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("invoice-ul");
      li = ul.getElementsByTagName("li");
      for (i = 0; i < li.length; i++) {
          div = li[i].getElementsByTagName("div")[0];
          a = div.getElementsByTagName("span")[0];
          txtValue = a.textContent || a.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
          } else {
              li[i].style.display = "none";
          }
      }
    }

    function searchPaymentMode() {
      var input, filter, ul, li, a, div, i, txtValue;
      input = document.getElementById("paymentModeInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("paymentMode-ul");
      li = ul.getElementsByTagName("li");
      for (i = 0; i < li.length; i++) {
          div = li[i].getElementsByTagName("div")[0];
          a = div.getElementsByTagName("span")[0];
          txtValue = a.textContent || a.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
          } else {
              li[i].style.display = "none";
          }
      }
    }

    window.addEventListener('mouseup', function(event) {
        var customerBox = document.querySelector(".select-customer-box");
    
        if (event.target != customerBox && event.target.parentNode != customerBox) {
          customerBox.style.display = "none";
        }
    });

    window.addEventListener('mouseup', function(event) {
        var invoiceBox = document.querySelector(".select-invoice-box");
    
        if (event.target != invoiceBox && event.target.parentNode != invoiceBox) {
          invoiceBox.style.display = "none";
        }
    });

    window.addEventListener('mouseup', function(event) {
        var paymentModeBox = document.querySelector(".select-payment-mode-box");
    
        if (event.target != paymentModeBox && event.target.parentNode != paymentModeBox) {
          paymentModeBox.style.display = "none";
        }
    });
  </script>
@endsection