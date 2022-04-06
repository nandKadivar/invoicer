@extends('layouts.admin');

@section('title')
Invoicer - Expenses
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
            <a class="nav-link collapsed" href="{{route('admin.payments')}}">
                <i class="bi bi-credit-card"></i>
                <span>Payments</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.expenses')}}">
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
      <h1>Edit Expense</h1>
      <nav class="d-flex flex-row justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('admin.expenses')}}">Expenses</a></li>
          <li class="breadcrumb-item active">Edit Expense</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="col-12" >
      <div class="card recent-sales overflow-auto">
          <div class="card" style="margin-bottom: 0px;">
            <div class="card-body">
              <h5 class="card-title">Edit Expense</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3 expenseForm">
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Category</label>
                  <input type="text" class="form-control" id="categoryInput" onkeyup="searchCategory()" placeholder="" title="Type in a name" onclick="openCategoryBox()">
                  <div style="position: relative;">
                    <div id="categoryBox" class="select-category-box">
                        <ul id="category-ul" class="category-ul scroll-area" style="max-height: 200px; overflow-y: scroll;">
                            @foreach($categories as $category)
                                <li onclick="selectCategory({{$loop->index}})" style="padding: 10px;">
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <span style="font-weight: 600;">{{$category->name}}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-none flex-row justify-content-center align-items-center py-3">
                            <span style="font-weight: 600; color: #94a3b8;">No Category found!</span>
                        </div>
                        <div data-bs-toggle="modal" data-bs-target="#categoryModel" class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;">
                            <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                            <span class="text-primary">Add New Category</span>
                        </div>
                    </div>
                  </div>
                  {{-- <select id="inputState" class="form-select">
                    <option value="">Select a Category</option>
                    <option>Transport</option>
                  </select> --}}
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Date</label>
                  @php
                    echo '<input type="date" class="form-control" id="expense_date" name="payment_date">';
                  @endphp
                  {{-- <input type="date" class="form-control" id="inputEmail5"> --}}
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Amount</label>
                  <input type="text" class="form-control" id="amount">
                </div>
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Currency</label>
                  <input type="text" class="form-control" id="currencyInput" onkeyup="searchCurrency()" placeholder="" title="Type in a name" onclick="openCurrencyBox()">
                  <div style="position: relative;">
                    <div id="currencyBox" class="select-currency-box">
                        <ul id="currency-ul" class="currency-ul scroll-area" style="max-height: 200px; overflow-y: scroll;">
                            @foreach($currencies as $currency)
                                <li onclick="selectCurrency({{$loop->index}})" style="padding: 10px;">
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <span style="font-weight: 600;">{{$currency->code}} - {{$currency->name}}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-none flex-row justify-content-center align-items-center py-3">
                            <span style="font-weight: 600; color: #94a3b8;">No Currency found!</span>
                        </div>
                        {{-- <div data-bs-toggle="modal" data-bs-target="#verticalycentered" class="d-flex flex-row justify-content-center align-items-center py-2" style="background-color: #e2e8f0; width: 100%; border-radius: 0px 0px 5px 5px; cursor: pointer;">
                            <i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i>
                            <span class="text-primary">Add New Category</span>
                        </div> --}}
                    </div>
                  </div>
                  {{-- <select id="inputState" class="form-select">
                    <option selected>INR - Indian Ruppee</option>
                    <option>...</option>
                  </select> --}}
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
                    <option>Indian Spices Ltd</option>
                    <option>Hari Krishna Exports</option>
                  </select> --}}
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
                    <option>Cash</option>
                    <option>Cheque</option>
                    <option>Netbanking</option>
                  </select> --}}
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 exchange-rate-input">
                  <label for="exchangeRate" class="col-form-label" style="padding-top: 0px;">Exchange rate</label>
                  <div class="col-11 d-flex flex-row align-items-center p-0">
                      <div class="d-flex align-items-center justify-content-center exchange-currency-indicator"></div><input type="number" class="form-control" name="exchange_rate" id="exchangeRate" style="border-radius: 0px 0.25rem 0.25rem 0px; border-left: 0px;" min="1">
                  </div>
                </div>

                <div class="col-md-12">
                <span style="font-weight: 600;">Notes</span>
                    <div id="editor" style="background-color: #fff; border-radius: 5px; border: 1px solid #ececec;">
                        {{-- <p class='notes-content'></p> --}}
                    </div>
                </div>

                {{-- <div class="col-mb-6">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                    <input class="form-control" type="file" id="formFile">
                </div> --}}

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

      </div>
    </div>
    {{-- Category Model --}}
    <div class="modal fade" id="categoryModel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="border-top: 6px solid var(--bs-primary);">
            <h5 class="modal-title">Add Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex flex-column align-items-center">
            <div class="col-12 py-2 d-flex flex-column">
              <Span style="font-weight: 600;">Name</Span>
              <input class="col-8 form-control" type="text" id="category_name">
            </div>
            <div class="col-12 py-2 d-flex flex-column">
              <Span style="font-weight: 600;">Description</Span>
              <input class="col-8 form-control" type="text" id="category_description">
            </div>
          </div>
          <div class="modal-footer">
            <div class="text-center">
              <button type="button" class="btn btn-primary" onclick="saveCategory()">
                  <i class="bi bi-download"></i>
                  Save Category
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main><!-- End #main -->

  <script>
    var expense = {!! json_encode($expense[0]); !!}
    var origin_id = expense.id;
    console.log(expense);
    var initialCategoryName = expense.category.name;
    var initialExpenseDate = expense.expense_date;
    var initialAmount = expense.amount;
    var initialCurrency = expense.currency.name;
    var initialCustomer = expense.customer.name;
    var initialPaymentMode = expense.payment_method.name;
    var initialExchangeRate = expense.exchange_rate;
    document.querySelector('#expense_date').value = initialExpenseDate;
    document.querySelector('#amount').value = initialAmount;
    document.querySelector('#categoryInput').value = initialCategoryName;
    document.querySelector('#currencyInput').value = initialCurrency;
    document.querySelector('#customerInput').value = initialCustomer;
    document.querySelector('#paymentModeInput').value = initialPaymentMode;
    // var editorElement = document.querySelector('.notes-content')
    // var editorContent = editorElement.getElementsByTagName('p')[0];
    // editorContent.innerHTML = expense.notes;
    // console.log(expense.notes);
    var customers = {!! json_encode($customers) !!};
    var categories = {!! json_encode($categories) !!};
    var selectedCustomerIndex=0;
    customers.forEach((element,index) => {
        if(element.name == initialCustomer){
            selectedCustomerIndex = index;
        }
    });
    var selectedCustomer = expense.customer;
    var selectedCustomerId = expense.customer.id;
    var customerSelected = true;
    var selectedPaymentModeId = expense.payment_method.id;
    var selectedCategoryId = expense.category.id;
    var selectedCurrencyId = expense.currency.id;
    var exchangeRate = expense.exchange_rate;

    if(initialExchangeRate > 1){
        $('.exchange-rate-input').show();
        document.getElementById('exchangeRate').value = parseFloat(initialExchangeRate).toFixed(2);
        document.querySelector('.exchange-currency-indicator').innerHTML = '1'+expense.currency.code+' =';
    }else{
        $('.exchange-rate-input').hide();
    }

    // $('.exchange-rate-input').hide();

    $('#exchangeRate').change(function () { 
        // console.log(this.value);
        exchangeRate = this.value;
    });

    const form = document.querySelector(".expenseForm");
    
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      
      const data = {
        expense_date: document.querySelector('#expense_date').value,
        notes: document.querySelector('.ck-content').innerHTML,
        amount: document.querySelector('#amount').value,
        expense_category_id: selectedCategoryId,
        company_id: 1,
        customer_id: selectedCustomerId,
        payment_method_id: selectedPaymentModeId,
        currency_id: selectedCurrencyId,
        exchange_rate: exchangeRate
      };

      // console.log(data);
      axios.post('http://127.0.0.1:8000/admin/expenses/'+origin_id+'/edit', data, {
        headers: { 
        'Content-Type': 'application/json',
        // 'X-CSRF-TOKEN': token.content,
        'X-Requested-With': 'XMLHttpRequest',
        }
      }).then(function(res){
        const { expense, id } = res.data;
        // console.log(payment);
        window.location.href = "http://127.0.0.1:8000/admin/expenses";
      });
    });

    const saveCategory = () => {
      var name = document.getElementById('category_name').value;
      var description = document.getElementById('category_description').value;

      const data = {
        name: name,
        description: description,
        company_id: 1
      };

      axios.post('http://127.0.0.1:8000/admin/categories/new', data, {
        headers: { 
        'Content-Type': 'application/json',
        // 'X-CSRF-TOKEN': token.content,
        'X-Requested-With': 'XMLHttpRequest',
        }
      }).then(function(res){
        const { updated_categories, id, name } = res.data;
        var tag = '';
        updated_categories.forEach((element,index) => {
          tag = tag + '<li onclick="selectCategory('+index+')" style="padding: 10px;"><div class="d-flex flex-row justify-content-between align-items-center"><span style="font-weight: 600;">'+element.name+'</span></div></li>'
        });
        $('#categoryModel').modal('hide');
        categories = updated_categories;
        document.querySelector('#category-ul').innerHTML = tag;
        selectedCategoryId = id;
        document.querySelector('#categoryInput').value = name;
      });
    }

    const selectCategory = (index) => {
      document.querySelector('#categoryInput').value = categories[index].name;
      selectedCategoryId = categories[index].id;
    }

    const selectCurrency = (index) => {
      var currencies = {!! json_encode($currencies) !!};
      document.querySelector('#currencyInput').value = currencies[index].name;
      selectedCurrencyId = currencies[index].id;

      // console.log(selectedCurrencyId);
      if(currencies[index].code != 'INR'){
        $('.exchange-rate-input').show();
        document.querySelector('.exchange-currency-indicator').innerHTML = '1'+currencies[index].code+' =';
      }else{
        $('.exchange-rate-input').hide();
        exchangeRate = 1;
      }
    }

    const selectCustomer = (index) => {
      document.querySelector('#customerInput').value = customers[index].name;
      selectedCustomerIndex = index;
      selectedCustomer = customers[index];
      selectedCustomerId = customers[index].id;
      customerSelected = true;
    }

    const selectPaymentMode = (index) => {
      var paymentModes = {!! json_encode($paymentModes) !!};
      document.querySelector('#paymentModeInput').value = paymentModes[index].name;
      selectedPaymentModeId = paymentModes[index].id;
    }

    const openCategoryBox = () => {
      var categoryBox = document.querySelector("#categoryBox");
      categoryBox.style.display = "flex";
    }

    const openCurrencyBox = () => {
      var currencyBox = document.querySelector("#currencyBox");
      currencyBox.style.display = "flex";
    }

    const openCustomerBox = () => {
      var customerBox = document.querySelector("#customerBox");
      customerBox.style.display = "flex";
    }

    const openPaymentModeBox = () => {
      var paymentModeBox = document.querySelector("#paymentModeBox");
      paymentModeBox.style.display = "flex";
    }

    function searchCategory() {
      var input, filter, ul, li, a, div, i, txtValue;
      input = document.getElementById("categoryInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("category-ul");
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

    function searchCurrency() {
      var input, filter, ul, li, a, div, i, txtValue;
      input = document.getElementById("currencyInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("currency-ul");
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
        var categoryBox = document.querySelector(".select-category-box");
    
        if (event.target != categoryBox && event.target.parentNode != categoryBox) {
          categoryBox.style.display = "none";
        }
    });

    window.addEventListener('mouseup', function(event) {
        var currencyBox = document.querySelector(".select-currency-box");
    
        if (event.target != currencyBox && event.target.parentNode != currencyBox) {
          currencyBox.style.display = "none";
        }
    });

    window.addEventListener('mouseup', function(event) {
        var customerBox = document.querySelector(".select-customer-box");
    
        if (event.target != customerBox && event.target.parentNode != customerBox) {
          customerBox.style.display = "none";
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