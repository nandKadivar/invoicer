@extends('layouts.app')

@section('title')
Installation
@endsection

@section('css')

<!--Font Awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link href="{{asset('assets/css/stepper.css')}}" rel="stylesheet">
<script src="{{asset('assets/js/stepper.js')}}"></script>

@endsection

@section('content')
    <main>
        {{-- Toast alert start--}}
        {{-- <button onclick="showToast()">Press</button> --}}
        <div class="wrapper">
            <div id="toast" class="d-flex flex-row justify-content-center align-items-center p-4">
                <p class="m-0 toast-msg">Your changes are saved successfully.</p>
            </div>
        </div>
        {{-- Toast alert end --}}
        <div class="container">
            <div class="page-header">
              <h1 class="h3"><img src="{{asset('assets/img/favicon.png')}}" alt=""> Invoicer
                <small>
                  Follow the process to installation Invoicer in your system
               </small>
              </h1>
              {{-- <h2 class="h5">Features: bootstrap tabs, disabled states, tooltips and directional functionality.</h2> --}}
          
            </div>
            <div class="panel panel-default">
              <div class="panel-body">
          
          
                <!-- STEPPER
                  Allows a user to complete steps in a given process.
                  
                      * Required base class: .stepper
                      @param .active
                      @param .completed
                      @param .disabled
          
                      Dependencies:
                        //maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css
                        //cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js
                        //maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js
                          
                  -->
          
                <div class="stepper">
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                      <a class="persistant-disabled" data-toggle="tab" data-target="#stepper-step-1" aria-controls="stepper-step-1" role="tab" title="System requirements">
                        <span class="round-tab">1</span>
                      </a>
                    </li>
                    <li role="presentation" class="disabled">
                      <a class="persistant-disabled" data-toggle="tab" data-target="#stepper-step-2" aria-controls="stepper-step-2" role="tab" title="URL & Database">
                        <span class="round-tab">2</span>
                      </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a class="persistant-disabled" data-toggle="tab" data-target="#stepper-step-3" aria-controls="stepper-step-3" role="tab" title="Domain">
                          <span class="round-tab">3</span>
                        </a>
                      </li>
                    <li role="presentation" class="disabled">
                      <a class="persistant-disabled" data-toggle="tab" data-target="#stepper-step-4" aria-controls="stepper-step-4" role="tab" title="Mail Configuration">
                        <span class="round-tab">4</span>
                      </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a class="persistant-disabled" data-toggle="tab" data-target="#stepper-step-5" aria-controls="stepper-step-5" role="tab" title="Account Setup">
                          <span class="round-tab">5</span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a class="persistant-disabled" data-toggle="tab" data-target="#stepper-step-6" aria-controls="stepper-step-6" role="tab" title="Company Info">
                          <span class="round-tab">6</span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                      <a class="persistant-disabled" data-toggle="tab" data-target="#stepper-step-7" aria-controls="stepper-step-7" role="tab" title="Complete">
                        <span class="round-tab">7</span>
                      </a>
                    </li>
                  </ul>
                  <form role="form">
                    <div class="tab-content">
                      <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-1">
                        <h3 class="h2">1. Check System Requirements</h3>
                        <p class="step-1-msg"></p>
                        <button class="btn btn-primary check-requirement-btn">Check Requirements</button>
                        <ul class="list-inline pull-right">
                          <li>
                            <a class="btn btn-primary next-step">Next</a>
                          </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-2">
                        <h3 class="h2">2. Database Setup</h3>
                        <p>This is step 2</p>
                        <form>
                            <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                                {{-- <div class="d-flex flex-column col-6 py-3">
                                  <label for="inputEmail3" class="col-sm-6 col-form-label px-0">App URL</label>
                                  <div class="col-sm-11 px-0">
                                    <input type="text" class="form-control" id="inputText" value="http://127.0.0.1:8000/">
                                  </div>
                                </div> --}}
                                
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Connection</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText" name="db" disabled value="mysql">
                                    </div>
                                </div>

                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Port</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText" name="db_port" value="3306">
                                    </div>
                                </div>

                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Name</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText" name="db_name">
                                    </div>
                                </div>

                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Username</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText" name="db_username">
                                    </div>
                                </div>

                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Password</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="password" class="form-control" id="inputText" name="db_password">
                                    </div>
                                </div>

                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Host</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText" value="127.0.0.1" name="db_host">
                                    </div>
                                </div>

                            </div>
                          </form>
                        <ul class="list-inline pull-right">
                          {{-- <li>
                            <a class="btn btn-default prev-step">Back</a>
                          </li> --}}
                          <li>
                            <a class="btn btn-primary next-step step2-btn">Save & Continue</a>
                          </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-3">
                        <h3 class="h2">3. Domain Configuration</h3>
                        <p>This is step 3</p>
                        <form>
                            <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                                <div class="d-flex flex-column col-6 py-3">
                                  <label for="inputEmail3" class="col-sm-6 col-form-label px-0">App URL</label>
                                  <div class="col-sm-11 px-0">
                                    <input type="text" class="form-control" id="inputText" name="app_url" value="http://127.0.0.1:8000/">
                                  </div>
                                </div>
                            </div>
                        </form>
                        <ul class="list-inline pull-right">
                            {{-- <li>
                              <a class="btn btn-default prev-step">Back</a>
                            </li> --}}
                            <li>
                                <a class="btn btn-primary next-step step3-btn">Save & Continue</a>
                            </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-4">
                        <h3 class="h2">4. Mail Configuration</h3>
                        <p>Mail Configuration</p>
                        <form>
                            <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                                <div class="d-flex flex-column col-6 py-3">
                                  <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Mail Driver</label>
                                  <div class="col-sm-11 px-0">
                                    <input type="text" class="form-control" id="inputText" name="mail_driver" value="smtp" disabled>
                                  </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">From Mail Name</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText" name="from_mail_name">
                                    </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">From Mail Address</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="email" class="form-control" id="inputText" name="from_mail_address">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="list-inline pull-right">
                            {{-- <li>
                              <a class="btn btn-default prev-step">Back</a>
                            </li> --}}
                            <li>
                                <a class="btn btn-primary next-step step4-btn">Save & Continue</a>
                            </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-5">
                        <h3 class="h2">5. Account Setup</h3>
                        <p>This is step 5</p>
                        <form>
                            <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                                <div class="row col-12">
                                    <div class="d-flex flex-column col-6 py-3">
                                        <label for="inputEmail3" class="col-sm-12 col-form-label px-0">Profile Picture</label>
                                        <div class="col-sm-5 px-0 drag-area d-flex flex-row align-items-center justify-content-center">
                                            {{-- <input type="text" class="form-control" id="inputText" value="smtp" disabled> --}}
                                            <i class="bi bi-cloud-upload" style="color: #92acd3; font-size: 26px;"></i>
                                            {{-- <i class="bi bi-plus-circle-dotted add-icon"></i> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Name</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText" name="account_name">
                                    </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Email</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="email" class="form-control" id="inputText" name="account_email">
                                    </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Password</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="password" class="form-control" id="inputText" name="account_password">
                                    </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Confirm Password</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="password" class="form-control" id="inputText" name="account_password_confirm">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="list-inline pull-right">
                            {{-- <li>
                              <a class="btn btn-default prev-step">Back</a>
                            </li> --}}
                            <li>
                              <a class="btn btn-primary next-step step4-btn">Save & Continue</a>
                            </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-6">
                        <h3 class="h2">6. Company Details</h3>
                        <p>This is step 6</p>
                        <form>
                          <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                              <div class="row col-12">
                                  <div class="d-flex flex-column col-6 py-3">
                                      <label for="inputEmail3" class="col-sm-12 col-form-label px-0">Company Logo</label>
                                      <div class="col-sm-5 px-0 logo-drag-area d-flex flex-row align-items-center justify-content-center">
                                          {{-- <input type="text" class="form-control" id="inputText" value="smtp" disabled> --}}
                                          <i class="bi bi-cloud-upload" style="color: #92acd3; font-size: 26px;"></i>
                                          {{-- <i class="bi bi-plus-circle-dotted add-icon"></i> --}}
                                      </div>
                                  </div>
                              </div>
                              <div class="d-flex flex-column col-6 py-3">
                                  <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Company Name</label>
                                  <div class="col-sm-11 px-0">
                                    <input type="text" class="form-control" id="inputText" name="company_name">
                                  </div>
                              </div>
                              <div class="d-flex flex-column col-6 py-3 country-select">
                                  <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Country</label>
                                  {{-- <div class="col-sm-11 px-0">
                                    <input type="email" class="form-control" id="inputText" name="account_email">
                                  </div> --}}
                                  <div class="col-sm-11 px-0">
                                    <select id="inputState" class="form-control" name='company_country_id'>
                                      @foreach ($countries as $i)
                                      <option value="{{$i['id']}}">{{$i['name']}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                              </div>
                              <div class="d-flex flex-column col-6 py-3">
                                  <label for="inputEmail3" class="col-sm-6 col-form-label px-0">State</label>
                                  <div class="col-sm-11 px-0">
                                    <input type="text" class="form-control" id="inputText" name="company_state">
                                  </div>
                              </div>
                              <div class="d-flex flex-column col-6 py-3">
                                  <label for="inputEmail3" class="col-sm-6 col-form-label px-0">City</label>
                                  <div class="col-sm-11 px-0">
                                    <input type="text" class="form-control" id="inputText" name="company_city">
                                  </div>
                              </div>
                              <div class="d-flex flex-column col-6 py-3">
                                <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Address 1</label>
                                <div class="col-sm-11 px-0">
                                  <input type="text" class="form-control" id="inputText" name="company_address_1">
                                </div>
                              </div>
                              <div class="d-flex flex-column col-6 py-3">
                                <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Phone</label>
                                <div class="col-sm-11 px-0">
                                  <input type="text" class="form-control" id="inputText" name="company_phone">
                                </div>
                              </div>
                              <div class="d-flex flex-column col-6 py-3">
                                <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Address 2</label>
                                <div class="col-sm-11 px-0">
                                  <input type="text" class="form-control" id="inputText" name="company_address_2">
                                </div>
                              </div>
                              <div class="d-flex flex-column col-6 py-3">
                                <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Zip</label>
                                <div class="col-sm-11 px-0">
                                  <input type="number" class="form-control" id="inputText" name="company_zip">
                                </div>
                              </div>
                          </div>
                      </form>
                        <ul class="list-inline pull-right">
                            {{-- <li>
                              <a class="btn btn-default prev-step">Back</a>
                            </li> --}}
                            {{-- <li>
                              <a class="btn btn-default cancel-stepper">Cancel Installation</a>
                            </li> --}}
                            <li>
                              <a class="btn btn-primary next-step step6-btn">Save & Continue</a>
                            </li>
                          </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-7">
                        <h3 class="h2">7. Company Preferences</h3>
                        <p>This is step 7</p>
                        <form>
                          <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                              <div class="d-flex flex-column col-6 py-3 currency-select">
                                  <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Currency</label>
                                  <div class="col-sm-11 px-0">
                                    <select id="inputState" class="form-control" name='company_currency_id'>
                                      @foreach ($currencies as $i)
                                        <option value="{{$loop->iteration}}">{{$i['code']}} - {{$i['name']}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                              </div>
                              <div class="d-flex flex-column col-6 py-3 financialYear-select">
                                <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Financial Year</label>
                                <div class="col-sm-11 px-0">
                                  <select id="inputState" class="form-control" name='company_currency_id'>
                                    @foreach ($financialYears as $i)
                                      <option value="{{$i['value']}}">{{$i['name']}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="d-flex flex-column col-6 py-3 dateformat-select">
                                <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Date Format</label>
                                <div class="col-sm-11 px-0">
                                  <select id="inputState" class="form-control" name='company_currency_id'>
                                    @foreach ($dateformats as $i)
                                      <option value="{{$i['value']}}">{{$i['name']}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                          </div>
                      </form>
                        <ul class="list-inline pull-right">
                          {{-- <li>
                            <a class="btn btn-default prev-step">Back</a>
                          </li> --}}
                          {{-- <li>
                            <a class="btn btn-default cancel-stepper">Cancel Installation</a>
                          </li> --}}
                          <li>
                            <a class="btn btn-primary next-step step6-btn">Save & Continue</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </form>
                </div>
          
              </div>
            </div>
          </div>
</main>

<script>
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
    $('.financialYear-select .dropdown-select ul').before('<div class="dd-search"><input id="FinancialYearSearchValue" autocomplete="off" onkeyup="Countryfilter()" class="dd-searchbox" type="text" autocomplete="false"></div>');
    $('.dateformat-select .dropdown-select ul').before('<div class="dd-search"><input id="DateformateSearchValue" autocomplete="off" onkeyup="Countryfilter()" class="dd-searchbox" type="text" autocomplete="false"></div>');
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

  function FinancialYearfilter(){
      var valThis = $('#FinancialYearSearchValue').val();
      $('.dropdown-select ul > li').each(function(){
      var text = $(this).text();
          (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show() : $(this).hide();         
    });
  };

  function dateformatYearfilter(){
      var valThis = $('#dateformatSearchValue').val();
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

    $(".check-requirement-btn").click(async (e) => {
        e.preventDefault();
        await axios
            .post('/installation/requirements',{
                headers: { 
                    'Content-Type': 'application/json',
                    // 'X-CSRF-TOKEN': token.content,
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then((res) => {
                console.log(res);
                $(".step-1-msg").text(res.data);
            }).catch((err) => {
                $(".step-1-msg").text(err);
                console.log(err);
            });
    });

    // cont toast(status message) => {
    //     document.getElementById("toast").style.transform = "translateY(0)";
    // }

    let x;
    let toast = document.getElementById("toast");
    function showToast(message, status){
        if(status == 'success'){
            document.getElementById("toast").classList.add('bg-success');
        }else if(status == 'warning'){
            document.getElementById("toast").classList.add('bg-warning');
        }else if(status == 'danger'){
            document.getElementById("toast").classList.add('bg-danger');
        }
        $('.toast-msg').text(message);
        clearTimeout(x);
        toast.style.transform = "translateX(0)";
        x = setTimeout(()=>{
            toast.style.transform = "translateY(400px)"
        }, 4000);
    }
    function closeToast(){
        toast.style.transform = "translateY(400px)";
    }

    const dropArea = document.querySelector(".drag-area");

    let file, isUploaded=false;

    dropArea.addEventListener("dragover", (e)=>{
        e.preventDefault();
        // console.log("File is over drop area!");
        dropArea.classList.add("active");
    });

    dropArea.addEventListener("dragleave", ()=>{
        // console.log("File is out side of drop area!");
        dropArea.classList.remove("active");
    });

    dropArea.addEventListener("drop", (e)=>{
        e.preventDefault();
        // console.log("File is droped on drop area!");
        file = e.dataTransfer.files[0];
        // console.log(file);
        let fileType = file.type;
        let validExtensions = ["image/jpeg","image/jpg", "image/png"];

        if(validExtensions.includes(fileType)){
            var fileReader = new FileReader();
            console.log(fileReader);
            // fileReader.onload = function(e) => {
            //     console.log('Hiii');
            //     let fileURL =  e.target.result;
            //     let imgTag = `<img src="${fileURL}" alt="" />`;
            //     dropArea.innerHtml = imgTag;
            // }
            // fileReader.onload = () => {
            //     let fileURL =  fileReader.result;
            //     console.log(fileURL);
            //     let imgTag = `<img src="${fileURL}" alt="" />`;
            //     dropArea.innerHTML = "<img src='C:/Users/Admin/Pictures/Saved Pictures/1.jpg' alt='profile pic'/>";
            // };

            // fileReader.readAsText(file);
            fileReader.addEventListener("load", function () {
                var image = new Image();
                // image.height = 100;
                // image.title = file.name;
                let src = this.result;
                let imgTag = `<img class="profile-pic" src="${src}" alt="" /> <div class="profile-remove p-2 bg-danger" style="display: flex; align-items: center; justify-content: center; width: 100%; position: absolute; bottom: 0px; color: #fff; font-size: 14px; border-radius: 0px 0px 5px 5px;" onclick="removePic()"><i class="bi bi-trash" style="margin-right: 5px;"></i>Remove</div>`;
                dropArea.innerHTML = imgTag;
                isUploaded = true;
                picLoaded();
            }, false);

            fileReader.readAsDataURL(file);

        }else{
            showToast('Invalid File Type', 'danger');
            dropArea.classList.remove("active");
        }
    });

    function picLoaded(){
        console.log('function call');
        $('.drag-area').mouseenter(function(){
            console.log('enter');
            // document.querySelector('.profile-remove').style.display = 'flex';
            $('.profile-remove').show(200);
        });

        $('.drag-area').mouseleave(function(){
            console.log('out');
            // document.querySelector('.profile-remove').style.display = 'none';
            $('.profile-remove').hide(200);
        });
    }

    function removePic(){
        file = null;
        let iTag = '<i class="bi bi-cloud-upload" style="color: #92acd3; font-size: 26px;"></i>';
        dropArea.innerHTML = iTag;
        isUploaded = false;
    }

</script>

@endsection
