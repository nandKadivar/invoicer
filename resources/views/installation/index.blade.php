@extends('layouts.app')

@section('title')
Installation
@endsection

@section('css')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link href="{{asset('assets/css/stepper.css')}}" rel="stylesheet">
<script src="{{asset('assets/js/stepper.js')}}"></script>

@endsection

@section('content')
    <main>
        
        <div class="container">
            <div class="page-header">
              <h1 class="h3">Invoicer
                <small>
                  Follow the process to installation Invoicer in your system
               </small>
              </h1>
              <h2 class="h5">Features: bootstrap tabs, disabled states, tooltips and directional functionality.</h2>
          
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
                        <p>This is step 1</p>
                        <ul class="list-inline pull-right">
                          <li>
                            <a class="btn btn-primary next-step">Next</a>
                          </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-2">
                        <h3 class="h2">2. URL & Database Setup</h3>
                        <p>This is step 2</p>
                        <ul class="list-inline pull-right">
                          <li>
                            <a class="btn btn-default prev-step">Back</a>
                          </li>
                          <li>
                            <a class="btn btn-primary next-step">Next</a>
                          </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-3">
                        <h3 class="h2">3. Domain Configuration</h3>
                        <p>This is step 3</p>
                        <ul class="list-inline pull-right">
                            <li>
                              <a class="btn btn-default prev-step">Back</a>
                            </li>
                            <li>
                              <a class="btn btn-primary next-step">Next</a>
                            </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-4">
                        <h3 class="h2">4. Mail Configuration</h3>
                        <p>Mail Configuration</p>
                        <ul class="list-inline pull-right">
                            <li>
                              <a class="btn btn-default prev-step">Back</a>
                            </li>
                            <li>
                              <a class="btn btn-primary next-step">Next</a>
                            </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-5">
                        <h3 class="h2">5. Account Setup</h3>
                        <p>This is step 5</p>
                        <ul class="list-inline pull-right">
                            <li>
                              <a class="btn btn-default prev-step">Back</a>
                            </li>
                            <li>
                              <a class="btn btn-primary next-step">Next</a>
                            </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-6">
                        <h3 class="h2">6. Company Details</h3>
                        <p>This is step 6</p>
                        <ul class="list-inline pull-right">
                            <li>
                              <a class="btn btn-default prev-step">Back</a>
                            </li>
                            {{-- <li>
                              <a class="btn btn-default cancel-stepper">Cancel Installation</a>
                            </li> --}}
                            <li>
                              <a class="btn btn-primary next-step">Submit</a>
                            </li>
                          </ul>
                      </div>
                      <div class="tab-pane fade" role="tabpanel" id="stepper-step-7">
                        <h3>4. All done!</h3>
                        <p>You have successfully completed all steps.</p>
                      </div>
                    </div>
                  </form>
                </div>
          
              </div>
            </div>
          </div>
</main>

@endsection
