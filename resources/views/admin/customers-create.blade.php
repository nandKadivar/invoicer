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

              {{-- <form class="row g-3" action="{{route('admin.customers.store')}}" method="post"> --}}
                <form class="row g-3 customerForm">
                @csrf
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">GST Number</label>
                  <input type="text" class="form-control" id="inputName5" name='gst_number'>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Display Name</label>
                  <input type="text" class="form-control" id="inputName5" name='name'>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Primary Contact Name</label>
                  <input type="text" class="form-control" id="inputEmail5" name='contact_name'>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" class="form-control" id="inputEmail5" name='email'>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Phone</label>
                  <input type="text" class="form-control" id="inputPassword5" name='phone'>
                </div>
                
                <div class="col-md-6 currency-select">
                  <label for="inputState" class="form-label">Primary Currency</label>
                  {{-- <select id="inputState" class="form-select" name='currency_id'>
                    <option value="12" selected>INR</option>
                    <option>USD</option>
                  </select> --}}
                  <select id="inputState" class="form-control" name='currency_id' autocomplete="off">
                    @foreach ($currencies as $i)
                      <option value="{{$loop->iteration}}">{{$i['code']}} - {{$i['name']}}</option>
                    @endforeach
                    {{-- <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option> --}}
                </select>
                </div>
                <div class="col-md-6">
                  <label for="inputZip" class="form-label">Website</label>
                  <input type="text" class="form-control" id="inputZip" name='website'>
                </div>
                
                <div class="col-md-12">
                  <hr/>
                </div>
                
                <div class="card-title">Billing Address</div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Name</label>
                  <input type="text" class="form-control" id="inputName5" name='billing_name'>
                </div>

                <div class="col-md-6 country-select">
                  <label for="inputState" class="form-label">Country</label>
                  {{-- <select id="inputState" class="form-select" name='billing_country_id'>
                    <option value="1" selected>INDIA</option>
                    <option value="2">USA</option>
                  </select> --}}
                  <select id="inputState" class="form-control" name='billing_country_id'>
                    @foreach ($countries as $i)
                      <option value="{{$i['id']}}">{{$i['name']}}</option>
                    @endforeach
                </select>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">State</label>
                  <input type="text" class="form-control" id="inputName5" name='billing_state'>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">City</label>
                  <input type="text" class="form-control" id="inputName5" name='billing_city'>
                </div>

                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Address 1</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="1234 Main St" name='billing_address_street_1'>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Phone</label>
                  <input type="text" class="form-control" id="inputPassword5" name='billing_phone'>
                </div>

                <div class="col-6">
                  <label for="inputAddress2" class="form-label">Address 2</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name='billing_address_street_2'>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Zip Code</label>
                  <input type="number" class="form-control" id="inputPassword5" name='billing_zip'>
                </div>

                <div class="col-md-12">
                  <hr/>
                </div>

                <div class="card-title">Shipping Address</div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Name</label>
                  <input type="text" class="form-control" id="inputName5" name='billing_name'>
                </div>

                <div class="col-md-6 country-select">
                  <label for="inputState" class="form-label">Country</label>
                  {{-- <select id="inputState" class="form-select" name='billing_country_id'>
                    <option value="1" selected>INDIA</option>
                    <option value="2">USA</option>
                  </select> --}}
                  <select id="inputState" class="form-control" name='billing_country_id'>
                    @foreach ($countries as $i)
                      <option value="{{$i['id']}}">{{$i['name']}}</option>
                    @endforeach
                </select>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">State</label>
                  <input type="text" class="form-control" id="inputName5" name='billing_state'>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">City</label>
                  <input type="text" class="form-control" id="inputName5" name='billing_city'>
                </div>

                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Address 1</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="1234 Main St" name='billing_address_street_1'>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Phone</label>
                  <input type="text" class="form-control" id="inputPassword5" name='billing_phone'>
                </div>

                <div class="col-6">
                  <label for="inputAddress2" class="form-label">Address 2</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name='billing_address_street_2'>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Zip Code</label>
                  <input type="number" class="form-control" id="inputPassword5" name='billing_zip'>
                </div>

                <div class="col-md-12">
                  <hr/>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">
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
  {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"> </script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha512-VZ6m0F78+yo3sbu48gElK4irv2dzPoep8oo9LEjxviigcnnnNvnTOJRSrIhuFk68FMLOpiNz+T77nNY89rnWDg==" crossorigin="anonymous"></script> --}}
  <script type="text/javascript">
    window.addEventListener("load", () => {
        const form = document.querySelector(".customerForm");
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            let data = new FormData(form);
            // console.log(data);
            // axios({
            //     method: "post",
            //     url: "/",
            //     data: data,
            // })
            //     .then((res) => {
            //         console.log(res);
            //     })
            //     .catch((err) => {
            //         throw err;
            //     });
            
            axios.post('http://127.0.0.1:8000/admin/customers/new', data, {
              headers: { 
                'Content-Type': 'application/json',
                // 'X-CSRF-TOKEN': token.content,
                'X-Requested-With': 'XMLHttpRequest',
              }
            }).then(
                response => console.log(response.data)
            ).catch(
                error => console.log(error)
            )
        });
    });


    function create_custom_dropdowns() {
    $('select').each(function (i, select) {
        if (!$(this).next().hasClass('dropdown-select')) {
            $(this).after('<div class="dropdown-select wide ' + ($(this).attr('class') || '') + '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
            var dropdown = $(this).next();
            var options = $(select).find('option');
            var selected = $(this).find('option:selected');
            dropdown.find('.current').html(selected.data('display-text') || selected.text());
            options.each(function (j, o) {
                var display = $(o).data('display-text') || '';
                dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ? 'selected' : '') + '" data-value="' + $(o).val() + '" data-display-text="' + display + '">' + $(o).text() + '</li>');
            });
        }
    });

    $('.currency-select .dropdown-select ul').before('<div class="dd-search"><input id="CurrencySearchValue" autocomplete="off" onkeyup="Currencyfilter()" class="dd-searchbox" type="text" autocomplete="false"></div>');
    $('.country-select .dropdown-select ul').before('<div class="dd-search"><input id="CountrySearchValue" autocomplete="off" onkeyup="Countryfilter()" class="dd-searchbox" type="text" autocomplete="false"></div>');
}

// Event listeners

// Open/close
$(document).on('click', '.dropdown-select', function (event) {
    if($(event.target).hasClass('dd-searchbox')){
        return;
    }
    $('.dropdown-select').not($(this)).removeClass('open');
    $(this).toggleClass('open');
    if ($(this).hasClass('open')) {
        $(this).find('.option').attr('tabindex', 0);
        $(this).find('.selected').focus();
    } else {
        $(this).find('.option').removeAttr('tabindex');
        $(this).focus();
    }
});

// Close when clicking outside
$(document).on('click', function (event) {
    if ($(event.target).closest('.dropdown-select').length === 0) {
        $('.dropdown-select').removeClass('open');
        $('.dropdown-select .option').removeAttr('tabindex');
    }
    event.stopPropagation();
});

function Currencyfilter(){
    var valThis = $('#CurrencySearchValue').val();
    $('.dropdown-select ul > li').each(function(){
     var text = $(this).text();
        (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show() : $(this).hide();         
   });
};

function Countryfilter(){
    var valThis = $('#CountrySearchValue').val();
    $('.dropdown-select ul > li').each(function(){
     var text = $(this).text();
        (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show() : $(this).hide();         
   });
};
// Search

// Option click
$(document).on('click', '.dropdown-select .option', function (event) {
    $(this).closest('.list').find('.selected').removeClass('selected');
    $(this).addClass('selected');
    var text = $(this).data('display-text') || $(this).text();
    $(this).closest('.dropdown-select').find('.current').text(text);
    $(this).closest('.dropdown-select').prev('select').val($(this).data('value')).trigger('change');
});

// Keyboard events
$(document).on('keydown', '.dropdown-select', function (event) {
    var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
    // Space or Enter
    //if (event.keyCode == 32 || event.keyCode == 13) {
    if (event.keyCode == 13) {
        if ($(this).hasClass('open')) {
            focused_option.trigger('click');
        } else {
            $(this).trigger('click');
        }
        return false;
        // Down
    } else if (event.keyCode == 40) {
        if (!$(this).hasClass('open')) {
            $(this).trigger('click');
        } else {
            focused_option.next().focus();
        }
        return false;
        // Up
    } else if (event.keyCode == 38) {
        if (!$(this).hasClass('open')) {
            $(this).trigger('click');
        } else {
            var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
            focused_option.prev().focus();
        }
        return false;
        // Esc
    } else if (event.keyCode == 27) {
        if ($(this).hasClass('open')) {
            $(this).trigger('click');
        }
        return false;
    }
});

$(document).ready(function () {
  create_custom_dropdowns();
});
</script>
@endsection