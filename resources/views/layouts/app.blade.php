<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>العلا</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link rel="icon" href="/images/desert-house_12309287.png">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/confetti.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body{
            font-family: cairo;
            left:0;
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
<body dir="rtl">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary fixed-top shadow">
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
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                   <a href="{{route('checkout')}}"  >
                    <i class="fa-solid fa-cart-shopping text-dark pt-3"></i> <span class="badge bg-danger">{{Session::get('count')}}</span>
                   </a>
                   
                  
                   
                  </li>
                    <li class="nav-item">
                      <a class="nav-link active text-dark" aria-current="page" href="{{route('login')}}">تسجيل الدخول</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark" href="{{route('register')}}">التسجيل</a>

                     
                  </ul>
               
                @else
                <ul class="navbar-nav">
                    <a href="{{route('checkout')}}" >
                    <li class="nav-item">
                    <img src="/images/cart-shopping-solid.png"style="width:20px; height:20px;" class="mt-2 ml-3"><span class="badge bg-danger">{{Session::get('count')}}</span>
                    </li></a>
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
        <!-- Container wrapper -->
    </nav>

        <main class="py-4">
            @yield('content')
            
        </main>

    </div>
    
</body>
</html>
