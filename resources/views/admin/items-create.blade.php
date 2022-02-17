@extends('layouts.admin')

@section('title')
Invoicer - New Item
@endsection

@section('content')
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

              <form>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputState" class="col-sm-2 col-form-label">Unit</label>
                  <div class="col-sm-10">
                    <select id="inputState" class="form-select">
                      <option selected>Select unit</option>
                      <option>kg</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputPassword"></textarea>
                  </div>
                </div>
                <div class="text-center">
                  <button type="button" class="btn btn-primary">
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
@endsection