@extends('layouts.app')

@section('title')
Installation
@endsection

@section('css')

<!--Font Awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
                                      <input type="text" class="form-control" id="inputText" disabled value="mysql">
                                    </div>
                                </div>

                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Port</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText" value="3306">
                                    </div>
                                </div>

                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Name</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText">
                                    </div>
                                </div>

                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Username</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText">
                                    </div>
                                </div>

                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Password</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="password" class="form-control" id="inputText">
                                    </div>
                                </div>

                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Database Host</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText" value="127.0.0.1">
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
                                    <input type="text" class="form-control" id="inputText" value="http://127.0.0.1:8000/">
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
                                    <input type="text" class="form-control" id="inputText" value="smtp" disabled>
                                  </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">From Mail Name</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText">
                                    </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">From Mail Address</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText">
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
                                      <input type="text" class="form-control" id="inputText">
                                    </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Email</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="text" class="form-control" id="inputText">
                                    </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Password</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="password" class="form-control" id="inputText">
                                    </div>
                                </div>
                                <div class="d-flex flex-column col-6 py-3">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label px-0">Confirm Password</label>
                                    <div class="col-sm-11 px-0">
                                      <input type="password" class="form-control" id="inputText">
                                    </div>
                                </div>
                            </div>
                        </form>
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

<script>
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

    let file;

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
                let imgTag = `<img src="${src}" alt="" />`;
                dropArea.innerHTML = imgTag;
            }, false);

            fileReader.readAsDataURL(file);

            // fileReader.onload = readSuccess;

            // function readSuccess(e){
            //     alert('Success');
            // }
        }else{
            showToast('Invalid File Type', 'danger');
            dropArea.classList.remove("active");
        }
    });
</script>

@endsection
