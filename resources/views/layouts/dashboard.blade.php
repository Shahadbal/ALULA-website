<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>العلا لوحة التحكم</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link rel="icon" href="/images/desert-house_12309287.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body{
            font-family: cairo;
            overflow-x: hidden;
        }
        body::before {
            content: "";
            background-image: url("/images/output-onlinepngtools.png");
            background-size: cover; /* or use "contain" based on your preference */
            background-repeat: no-repeat;
            background-position: center center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1; /* Place the background behind other content */
            height: 100vh; /* Set the height to 100% of the viewport height */
            width: 100%;
        }
    </style>
</head>
<body dir="rtl" lang='ar'>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary top shadow ">
            <!-- Container wrapper -->
            <div class="container-fluid ">
                <!-- Toggle button -->
                <button
                data-mdb-collapse-init
                class="navbar-toggler"
                type="button"
                data-mdb-target="#navbarRightAlignExample"
                aria-controls="navbarRightAlignExample"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarRightAlignExample">
                <!-- Left links -->
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                        <img src="/images/desert-house_12309287.png" style="width:45px; height: 45px;" class="nav-link active" aria-current="page" href="#">
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link" dir ='ltr' href="{{route('spor')}}">الفعاليات الرياضية</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" dir ='ltr' href="{{route('adv')}}"> المغامرات</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" dir ='ltr' href="{{route('tour')}}"> الجولات</a>
                </li>
                <!-- Left links -->
                </div>
                <div>
                @if(Auth::guest())
                    <ul class="navbar-nav">
                 
                    <li class="nav-item">
                      <a class="nav-link active text-dark" aria-current="page" href="{{route('login')}}">تسجيل الدخول</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark" href="{{route('register')}}">التسجيل</a>

                     
                  </ul>
               
                @else
                <ul class="navbar-nav">
                 
                 <li class="nav-item">
                   <a class="nav-link text-dark" href="{{route('logout')}}">تسجيل الخروج</a>

                  
                 </li>
                        @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{route('loginadmin')}}">لوحة التحكم</a>

                            
                        </li>
                        @endif

                    
                    </li>
               </ul>
                </div>
                @endif
            <!-- Collapsible wrapper -->
        </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>

        <main class="py-0">
            <div class="row">
                <div class="col-sm-2  text-decoration-none text-white">
                    <div class="col-auto px-0 bg-dark shadow mt-6 pt-4 ">
                        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                            <a href="/" class="d-flex align-items-center text-white text-decoration-none text-end">
                                <span class="fs-4  d-sm-inline">القائمة</span>
                            </a>
                            <ul class="nav  flex-column " id="menu">
                                <li class="nav-item">
                                    <a href="{{route('cpanel')}}" class="nav-link">
                                        <i class=""></i> <span class="fs-5">الرئيسية</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link align-middle">
                                        <i class=""></i> <span class=" d-none d-sm-inline fs-5">الفعاليات والأنشطة</span></a>
                                    <ul class="collapse nav flex-column " id="submenu2" data-bs-parent="#menu">
                                        <li class="w-100">
                                            <a href="{{route('GetSports')}}" class="nav-link"> <span class="d-none d-sm-inline fs-5">الفعاليات الرياضية</span> </a>
                                        </li>
                                        <li>
                                            <a href="{{route('GetAdventure')}}" class="nav-link"> <span class="d-none d-sm-inline fs-5">المغامرات</span></a>
                                        </li>
                                        <li>
                                            <a href="{{route('GetTours')}}" class="nav-link"> <span class="d-none d-sm-inline fs-5">الجولات</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('GetBills')}}" class="nav-link">
                                        <i class=""></i> <span class="fs-5">الفواتير</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 mt-5">
                    @yield('content')
                </div>
            </div>
        </main>

    </div>
    
    <footer class=" text-center text-lg-start mt-auto fixed-bottom bg-dark">
        <!-- Copyright -->
        <div class="text-center p-3">
          © 2020 Copyright:
          <a class="text-body" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>
</html>
