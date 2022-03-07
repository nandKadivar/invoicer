<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">




    <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  {{-- <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet"> --}}

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
</head>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{asset('assets/img/logo.png')}}" alt="">
                <span class="d-none d-lg-block">Invoicer</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-plus-square"></i>
                        <!-- <span class="badge bg-primary badge-number">4</span> -->
                    </a>
                    <!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <!-- <li class="dropdown-header">
                            Create New
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li> -->
                        <!-- <li>
                            <hr class="dropdown-divider">
                        </li> -->

                        <li class="notification-item">
                            <i class="bi bi-receipt text-warning"></i>
                            <div>
                                <h4>Invoice</h4>
                                <!-- <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p> -->
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-person text-success"></i>
                            <div>
                                <h4>Customer</h4>
                                <!-- <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p> -->
                            </div>
                        </li>

                        <!-- <li>
                            <hr class="dropdown-divider">
                        </li> -->

                        <!-- <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li> -->

                        <!-- <li>
                            <hr class="dropdown-divider">
                        </li> -->

                        <!-- <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li> -->

                        <!-- <li>
                            <hr class="dropdown-divider">
                        </li> -->
                        <!-- <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li> -->

                    </ul>
                    <!-- End Notification Dropdown Items -->

                </li>
                <!-- End Notification Nav -->

                <!-- <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul>
                </li> -->
                <!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                        <!-- <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span> -->
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <!-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li> -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <!-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li> -->
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li> --}}

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    
    
    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Invoicer</span></strong>. All Rights Reserved
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js "></script>
    <script>
        // var itemBox = document.querySelector(".item-box");
        // itemBox.style.display = "none";

        const openCustomerBox = () => {
            var customerBox = document.querySelector(".customer-box");
            customerBox.classList.add("active-box");
        }

        const openTaxBox = () => {
            // alert('Clicked!')
            var taxBox = document.querySelector(".tax-box");
            taxBox.classList.add("active-box");
        }

        const openFiledBox = () => {
            var filedBox = document.querySelector(".field-box");
            filedBox.classList.add("active-box");
        }

        const openItemBox = () => {
            var itemBox = document.querySelector(".item-box");
            itemBox.style.display = "flex";
        }

        window.addEventListener('mouseup', function(event) {
            var taxBox = document.querySelector(".tax-box");
            if (event.target != taxBox && event.target.parentNode != taxBox) {
                taxBox.classList.remove("active-box");
            }
        });

        window.addEventListener('mouseup', function(event) {
            var customerBox = document.querySelector(".customer-box");
            if (event.target != customerBox && event.target.parentNode != customerBox) {
                customerBox.classList.remove("active-box");
            }
        });

        window.addEventListener('mouseup', function(event) {
            var fieldBox = document.querySelector(".field-box");
            if (event.target != fieldBox && event.target.parentNode != fieldBox) {
                fieldBox.classList.remove("active-box");
            }
        });

        window.addEventListener('mouseup', function(event) {
            var itemBox = document.querySelector(".item-box");
            if (event.target != itemBox && event.target.parentNode != itemBox) {
                itemBox.style.display = "none";
            }
        });

        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        const addRow = () => {
            var table = document.querySelector(".items-table");
            var row = table.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);

            cell1.innerHTML = "<td><input type='text' list='items' class='form-control'><datalist id='items'><option value='Stones' style='background-color: #fff;'><option value='Steel'><option value='Cement'></datalist></td>"
            cell2.innerHTML = "<td><input type='text' class='form-control'></td>"
            cell3.innerHTML = "<td><input type='text' class='form-control'></td>"
            cell4.innerHTML = "<td> $ 0.00 </td>"
            cell5.innerHTML = "<i class='bi bi-trash' style='cursor :pointer;' onclick='deleteRow(" + row.rowIndex + ")'></i>";
        }

        const deleteRow = (index) => {
            var table = document.querySelector(".items-table");
            table.deleteRow(index);

            var tbody = table.getElementsByTagName("tbody")[0];
            var rows = tbody.getElementsByTagName("tr");
            // console.log(rows);
            var i = 1;
            for (i = 0; i < rows.length; i++) {
                var deleteTableCell = rows[i + 1].getElementsByTagName("td")[4];
                // console.log(deleteTableCell);
                // console.log(i + 2);
                var newIndex = i + 2;
                deleteTableCell.innerHTML = "<i class='bi bi-trash' style='cursor :pointer;' onclick='deleteRow(" + newIndex + ")'></i>";
            }
        }

        function myFunction1() {
            var input, filter, ul, li, a, div1, div, i, txtValue;
            input = document.getElementById("myInput1");
            filter = input.value.toUpperCase();
            ul = document.querySelector(".customer-ul");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                div1 = li[i].getElementsByTagName("div")[0];
                div = div1.getElementsByTagName("div")[1];
                a = div.getElementsByTagName("span")[0];
                // a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }

        function myFunction2() {
            var input, filter, ul, li, a, div, i, txtValue;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            ul = document.querySelector(".tax-ul");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                div = li[i].getElementsByTagName("div")[0];
                a = div.getElementsByTagName("span")[0];
                // a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }

        function myFunction3() {
            var input, filter, ul, li, a, div, i, txtValue;
            input = document.getElementById("myInput3");
            filter = input.value.toUpperCase();
            ul = document.querySelector(".item-ul");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                // div = li[i].getElementsByTagName("div")[0];
                // a = div.getElementsByTagName("span")[0];
                a = li[i];
                // a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Select components with search JS Files -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> --}}
    
</body>
</html>
