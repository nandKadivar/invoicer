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
      <div class="col-lg-3 col-md-4 col-sm-0 col-0 mt-0 customer-panel card p-0" style="overflow-y: auto; height: 92vh; border-radius: 0px;">
        @foreach($payments as $payment)
          <div class="col-xl-12 p-3 d-flex flex-row align-items-center justify-content-between customer-view" id="customer-view-{{$payment->id}}" style="padding-left: 20px !important; cursor: pointer;" onclick="invoiceSelect('{{$payment->id}}')">
            <div class="d-flex flex-column">
              <p class="mb-1" style="font-size: 14px; color: #040405">{{$payment->invoice->customer->name}}</p>
              <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">{{$payment->payment_number}}</span>
            </div>
            <div class="d-flex flex-column align-items-end">
              <span style="font-weight: 650;">{{$payment->currency->symbol}} {{$payment->amount}}</span>
              <span class="text-gray-600 mb-1" style="font-size: 12px; font-weight: 600; color: #475569;">{{$payment->formatted_payment_date}}</span>
            </div>
          </div>
        @endforeach
      </div>

      <div class="col-lg-9 col-md-8 col-sm-12 col-12 customer-panel card p-4" style="overflow-y: auto;height: 92vh; background-color: transparent; box-shadow: none;">
        <div class="col-xl-12 d-flex flex-row align-items-center justify-content-end">
          <button data-bs-toggle="modal" data-bs-target="#sendInvoiceModel" class="btn btn-primary type-1" style="margin-right: 10px;">
            Send Payment Receipt
          </button>
          <div class="filter d-flex flex-row align-items-center justify-content-end">
              <button class="btn btn-primary" data-bs-toggle="dropdown" style="height: 37px;"><i class="bi bi-three-dots" style="color: #fff;"></i></button>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li style='cursor: pointer;'><a class="dropdown-item"><i class="bi bi-pencil"></i> Edit</a></li>
                  <li style='cursor: pointer;' onclick="copyPdfUrl()"><a class="dropdown-item"><i class="bi bi-link-45deg"></i> Copy PDF Url</a></li>
                  <li style='cursor: pointer;' onclick="deletePayment()"><a class="dropdown-item"><i class="bi bi-trash"></i> Delete</a></li>
              </ul>
          </div>
          {{-- <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div> --}}
        </div>

        <div class="col-12 mt-1">
          <h5 id="payment_id" class="card-title">{{$selectedPayment->payment_number}}</h5>
          <iframe id='payment_pdf' src="{{asset('payment/'.$id.'/temp.pdf')}}" style="width: 100%; height: 70vh; border-radius: 5px;"></iframe>        
        </div>

      </div>
    </div>
    <!-- Send Invoice Model -->
    <div class="modal fade" id="sendInvoiceModel" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="border-top: 6px solid var(--bs-primary);">
            <h5 class="modal-title">Send Payment Receipt</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex flex-column align-items-center">
            {{-- <div class="col-12 py-2 d-flex flex-column">
              <Span style="font-weight: 600;">From</Span>
              <input class="col-8 form-control" type="email" class="form-control" id="from">
            </div> --}}
            <div class="col-12 py-2 d-flex flex-column">
              <Span style="font-weight: 600;">To</Span>
              <input class="col-8 form-control" type="email" class="form-control" id="to">
            </div>
            <div class="col-12 py-2 d-flex flex-column">
              <Span style="font-weight: 600;">Subject</Span>
              <input class="col-8 form-control" type="text" class="form-control" id="subject">
            </div>
            <div class="col-12 py-2 d-flex flex-column">
              <Span style="font-weight: 600;">Body</Span>
              <div id="editor">
              </div>
              {{-- <input class="col-8" type="number" value="0.00" class="form-control"> --}}
            </div>
          </div>
          <div class="modal-footer">
            <div class="text-center">
              <button type="button" class="btn btn-primary" onclick="sendInvoice()">
                <i class="bi bi-send"></i>
                 Send
              </button>
            </div>
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
          <!-- </form> -->
      </div>
    </div>
  </section>

</main>

<script>
  // $(document).ready(function($){

    var url = window.location.href;
    var i = url.lastIndexOf('/');
    var id = url.substring(i+1);
    console.log(id);
    document.querySelector('#customer-view-'+id).classList.add('active-view');
    var invoices = {!! json_encode($payments) !!};
    var initialInvoice = {!! json_encode($selectedPayment) !!}

    // if(initialInvoice.status == 'DRAFT'){
    //   var type1 = $('.type-1').show();
    //   var type2 = $('.type-2').hide();

    // }else {
    //   var type1 = $('.type-1').hide();
    //   var type2 = $('.type-2').show();
    // }

    const invoiceSelect = (newId) => {
      // Current URL: https://my-website.com/page_a
      const nextURL = 'http://127.0.0.1:8000/admin/payments/view/'+newId;
      const nextTitle = 'My new page title';
      const nextState = { additionalInformation: 'Updated the URL with JS' };

      window.history.pushState(nextState, nextTitle, nextURL);

      window.history.replaceState(nextState, nextTitle, nextURL);

      invoices.forEach(element => {
        if(element.id == newId){
          invoice = element;
        }
      });

      document.querySelector('#customer-view-'+id).classList.remove('active-view');
      document.querySelector('#customer-view-'+newId).classList.add('active-view');
      document.querySelector('#payment_id').innerHTML= invoice.payment_number;
      document.querySelector('#payment_pdf').setAttribute('src','http://127.0.0.1:8000/payment/'+newId+'/temp.pdf');
      
      // if(invoice.status == 'DRAFT'){
      //   var type1 = $('.type-1').show();
      //   var type2 = $('.type-2').hide();
      // }else{
      //   var type1 = $('.type-1').hide();
      //   var type2 = $('.type-2').show();
      // }

      id = newId;
    }

    const copyPdfUrl = () => {
      var pdfUrl = 'http://127.0.0.1:8000/payments/pdf/'+id;

      navigator.clipboard.writeText(pdfUrl);
    }
  
  // });
    const deletePayment = () => {
      const data = {id: id};
      axios.post('http://127.0.0.1:8000/admin/payments/delete', data,{
        headers: { 
        'Content-Type': 'application/json',
        // 'X-CSRF-TOKEN': token.content,
        'X-Requested-With': 'XMLHttpRequest',
        }
      }).then(function(res){
        const {success, msg} = res.data;
        window.location.href = "http://127.0.0.1:8000/admin/paymentss";
      });
    }

    const markSend = () => {
      const data = {
        id: id
      }

      axios.post('http://127.0.0.1:8000/admin/payments/markSend', data,{
        headers: { 
        'Content-Type': 'application/json',
        // 'X-CSRF-TOKEN': token.content,
        'X-Requested-With': 'XMLHttpRequest',
        }
      }).then(function(res){
        const success = res.data.success;
        if(success){
          window.location.href = "http://127.0.0.1:8000/admin/payments/view/"+id;
        }
      });
    }

    const sendInvoice = () => {
      // var from = document.querySelector('#from').value;
      var to = document.querySelector('#to').value;
      var subject = document.querySelector('#subject').value;
      var body = document.querySelector('.ck-content');
      body = body.getElementsByTagName('p')[0].innerHTML;

      const data = {
        // from: from,
        to: to,
        subject: subject,
        body: body,
        payment_id: id 
      };

      axios.post('http://127.0.0.1:8000/admin/payments/send', data,{
        headers: { 
        'Content-Type': 'application/json',
        // 'X-CSRF-TOKEN': token.content,
        'X-Requested-With': 'XMLHttpRequest',
        }
      }).then(function(res){
        const {success} = res.data;
          if(success){
            // $('#categoryModel').modal('hide');
            window.location.href = "http://127.0.0.1:8000/admin/payments/view/"+id;
          }
      });
    }
  
</script>

@endsection