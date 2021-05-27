@include('dashboard.layouts.header')
<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin6">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="dashboard.html">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        {{-- <img src="plugins/images/logo-icon.png" alt="homepage" /> --}}
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        {{-- <img src="plugins/images/logo-text.png" alt="homepage" /> --}}
                    </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav me-auto d-flex align-items-center">

                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class=" in">
                        <form action="{{ route('customers.index') }}" role="search" class="app-search d-none d-md-block me-3">
                            <input autocomplete="off" id="search" value="{{ request()->name }}" type="text" name="name" placeholder="بحث..." class="form-control mt-0">
                            <a href="" class="active">
                                <i class="fa fa-search"></i>
                            </a>
                        </form>

                        <div id="search-result">
                            
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li>
                        <a class="profile-pic" href="#"
                        data-bs-toggle="modal" 
                        data-bs-target="#profileModal"
                        >
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                    <li>
                        <a class="profile-pic" href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    @include('dashboard.layouts.aside')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">لوحة التحكم</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex">
                        {{-- <ol class="breadcrumb ms-auto">
                            <li><a href="#" class="fw-normal">Dashboard</a></li>
                        </ol> --}}
                        
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            @yield('content')


            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profileModalLabel">الملف الشخصي</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('profile') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">الاسم:</label>
                                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">رقم الهاتف:</label>
                                    <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">كلمة المرور:</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        
        <!-- ============================================================== -->
        <footer class="footer text-center"> 2021 © كل الحقوق محفوظة لشركة الذهبية 
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/') }}js/app-style-switcher.js"></script>
<script src="{{ asset('/') }}plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<!--Wave Effects -->
<script src="{{ asset('/') }}js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{ asset('/') }}js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{ asset('/') }}js/custom.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="{{ asset('/') }}plugins/bower_components/chartist/dist/chartist.min.js"></script>
<script src="{{ asset('/') }}plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="{{ asset('/') }}js/pages/dashboards/dashboard1.js"></script>
<script src="{{ asset('/') }}js/notify.min.js"></script>
@if(session('success'))
<script>
    $.notify("{{ session('success') }}", 'success');
</script>
@endif

@stack('js')



<script>
    $("#search").keyup(function() {

        if($('#search').val()) {
            fetch('{{ url("search") }}' + '/' + $('#search').val())
            .then(response => response.json())
            .then(data => {
                if(data) {
                    $("#search-result").html('')
                    data.forEach(customer => {
                        $("#search-result").css('display' , 'block')
                        var p = `
                            <p><a href="{{ url("customers") }}`+ "/" + customer['id'] +`">`+ customer['name']  +`</a></p>
                        `

                        $("#search-result").append(p)
                    });
                }
            })
            .catch((error) => {
            console.error('Error:', error);
            });
        }
    });
</script>
</body>
