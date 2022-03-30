@extends('layouts.admin')

@section('title')
Invoicer - New Item
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
            <a class="nav-link" href="{{route('admin.items')}}">
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
      <h1>New Item</h1>
      <nav class="d-flex flex-row justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('admin.items')}}">Items</a></li>
          <li class="breadcrumb-item active">New Item</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class='col-md-12'>
      <div class="col-lg-8">

          <div class="card">
            <div class="card-body p-4">
              {{-- <h5 class="card-title">Horizontal Form</h5> --}}

              <form action="{{route('admin.items.store')}}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="inputText">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="price" id="inputEmail">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">GST (%)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="gst" id="inputEmail">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputState" class="col-sm-2 col-form-label">Unit</label>
                  <div class="col-sm-10 unit-select">
                    {{-- <select id="inputState" class="form-select" name="unit_id">
                      <option selected>Select unit</option>
                      <option value="1">kg</option>
                    </select> --}}
                    {{-- <input type="number" class="form-control" name="gst" id="inputEmail"> --}}
                    <select id="inputState" class="form-control" name='unit_id'>
                      @foreach ($units as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputPassword" name="description"></textarea>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-download"></i>
                    Save Item
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>
    </div>

  </main>

  {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> --}}
  <script>
    // window.addEventListener("load", () => {
    //   const form = document.querySelector(".customerForm");
    //   form.addEventListener("submit", async (e) => {
    //     e.preventDefault();
    //     let form_data = new FormData(form);
        
    //     const data = {
    //       gst_number: form_data.get('gst_number'),
    //       name: form_data.get('name'),
    //       contact_name: form_data.get('contact_name'),
    //       email: form_data.get('email'),
    //       phone: form_data.get('phone'),
    //       currency_id: form_data.get('currency_id'),
    //       website: form_data.get('website'),
    //       prefix: null,
    //       enable_portal: 0,
    //       billing: {
    //         name: form_data.get('billing_name'),
    //         country_id: form_data.get('billing_country_id'),
    //         state: form_data.get('billing_state'),
    //         city: form_data.get('billing_city'),
    //         address_street_1: form_data.get('billing_address_street_1'),
    //         address_street_2: form_data.get('billing_address_street_2'),
    //         phone: form_data.get('billing_phone'),
    //         zip: form_data.get('billing_zip')
    //       },
    //       shipping: {
    //         name: form_data.get('shipping_name'),
    //         country_id: form_data.get('shipping_country_id'),
    //         state: form_data.get('shipping_state'),
    //         city: form_data.get('shipping_city'),
    //         address_street_1: form_data.get('shipping_address_street_1'),
    //         address_street_2: form_data.get('shipping_address_street_2'),
    //         phone: form_data.get('shipping_phone'),
    //         zip: form_data.get('shipping_zip')
    //       }
    //     }
    //       // console.log(data);

    //     let res = axios.post('http://127.0.0.1:8000/admin/customers/new', data, {
    //       headers: { 
    //         'Content-Type': 'application/json',
    //         // 'X-CSRF-TOKEN': token.content,
    //         'X-Requested-With': 'XMLHttpRequest',
    //       }
    //     });

    //     console.log(res);
    //   });
    // });

    function create_custom_dropdowns() {
      $('select').each(function (i, select) {
          if (!$(this).next().hasClass('dropdown-select')) {
              $(this).after('<div class="dropdown-select wide ' + ($(this).attr('class') || '') + '" tabindex="0"><span class="current"></span><div class="list scroll-area"><ul></ul></div></div>');
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

      $('.unit-select .dropdown-select ul').before('<div class="dd-search"><input id="UnitSearchValue" autocomplete="off" onkeyup="unitfilter()" class="dd-searchbox" type="text" autocomplete="false"></div>');
      $('.unit-select .dropdown-select ul').after('<div class="dd-add py-2"><i class="bi bi-plus-circle text-primary" style="padding-right: 5px;"></i> <spna class="text-primary">Add New Unit</span></div>');
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

    function unitfilter(){
        var valThis = $('#UnitSearchValue').val();
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