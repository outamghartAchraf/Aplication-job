<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('/css/styleHome.css')}}" />
    <link rel="icon" href="/images/jobicon.png"/>

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />



    <!-- <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('filecss')
</head>

<body>
    @include('sweetalert::alert')
    <header class="">

        <div class="title  ">AchJob</div>

        <nav class=" ">
            <ul class="navnav  ">
                <li><a class="lin" href="/">Home</a></li>
                <li><a class="lin" href="/#jobs">Jobs</a></li>
                <li><a class="lin" href="/#pricing">Pricing List</a></li>
                <li><a class="lin" href="/#contact">Conatct</a></li>
                @if(Auth::check() && auth()->user()->user_type === "employer")
                <li><a class="lin" href="{{route('sub')}}">Subscription</a></li>
                <li><a class="lin" href="{{route('dashboard')}}">Dashboard</a></li>
                @endif
                @if(!Auth::check())
                <li><a class="lin" href="{{route('login')}}">Login</a></li>
                <li><a class="lin" href="{{route('register_seeker')}}">Job Seeker</a></li>
                <li><a class="lin" href="{{route('register_employer')}}">Company</a></li>
                @endif


            </ul>
        </nav>

        <div class="lightmode  ">

         

            @if(Auth::check())
            <div class="useProfile" id="useProfile">
                <div class="box-image">
                    <img src="{{Storage::url(auth()->user()->profile_pic)}}" alt="profile" />
                </div>
                <div>{{auth()->user()->name}}</div>
                <i class="fa-solid fa-caret-down"></i>
            </div>
            @endif
        
            
            <div class="biglight" id="menubar">
                <div class="linkicon1">
                    <i class="fa-solid fa-bars"></i>

                </div>
            </div>
            
            <div class="linkicon" id="changemode">
                <i class="fas fa-moon"></i>



            </div>



        </div>

        <div class=" xfixed" id="fixed">
            <ul class="ulfixed ">
                <li><button id="closemenu" class="fa-solid fa-xmark"></button></li>
                <li><a class="lin" href="">Home</a></li>
                <li><a class="lin" href="/#jobs">Jobs</a></li>
                <li><a class="lin" href="/#pricing">Pricing List</a></li>
                <li><a class="lin" href="/#contact">Conatct</a></li>
                @if(Auth::check() && auth()->user()->user_type === "employer")
                <li><a class="lin" href="{{route('sub')}}">Subscription</a></li>
                <li><a class="lin" href="{{route('dashboard')}}">Dashboard</a></li>
                @endif
                @if(!Auth::check())
                <li><a class="lin" href="{{route('login')}}">Login</a></li>
                <li><a class="lin" href="{{route('register_seeker')}}">Job Seeker</a></li>
                <li><a class="lin" href="{{route('register_employer')}}">Company</a></li>
                @endif

            </ul>
        </div>


        <div class="boxprofile" id="menuprofile">
            <ul class="ulprofile">
                <li><a href="{{route('user.Seeker.Profile')}}"><i class="fa-solid fa-user"></i> my profile</a></li>
                @if(auth()->check() && auth()->user()->user_type == "seeker")

                <li><a id="" href="{{route('jobs.user_apply')}}"><i class="fa-brands fa-joomla"></i> My choise job</a></li>
                @endif
                <li><a id="logout"   href="#"><i class="fa-solid fa-right-from-bracket"></i> log out</a></li>
                <form method="POST" id="formlogout" action="{{route('logout')}}">@csrf</form>

            </ul>
        </div>
    </header>

    <section class="sect" id=" ">
        @yield('content')

    </section>
  
    <div class="loader-wrapper" id="loaderWrapper">
    <div class="loader"></div>
    </div>

    
 



    
    <footer class="footer sec">
        <div class="footer-container">
            <div class="footer-top">
                
                <div class="item_div_footer">
                    <h6 class="footer-title">ACH JOB</h6>
                    <ul class="footer-list">
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">About</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">Careers</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">Affiliates</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">Sitemap</a>
                        </li>
                    </ul>
                </div>
                <div class="item_div_footer">
                    <h6 class="footer-title">Company</h6>
                    <ul class="footer-list">
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">About</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">Careers</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">Affiliates</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">Sitemap</a>
                        </li>
                    </ul>
                </div>
                <div class="item_div_footer">
                    <h6 class="footer-title">SEEKER A JOB </h6>
                    <ul class="footer-list">
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">About</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">Careers</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">Affiliates</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-link">Sitemap</a>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="footer-divider">

            <div class="footer-bottom">
                <span class="copyright">&copy; 2024 BY ACHRAF OUTAMGHART</span>
                <ul class="footer-list">
                    <li class="footer-list-item">
                        <a href="#" class="footer-list-link">
                            <i class="ri-facebook-circle-line"></i>
                        </a>
                    </li>
                    <li class="footer-list-item">
                        <a href="#" class="footer-list-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                    </li>
                    <li class="footer-list-item">
                        <a href="#" class="footer-list-link">
                            <i class="ri-twitter-line"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </footer>
     



   
     



    <script src="/js/scriptHome.js"></script>
    <script>
        let menuprofile = document.getElementById('menuprofile');
        let useProfile = document.getElementById('useProfile');


        useProfile.addEventListener("click", () => {
            menuprofile.classList.toggle('as');
        })
    </script>

<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js" integrity="sha512-jEnuDt6jfecCjthQAJ+ed0MTVA++5ZKmlUcmDGBv2vUI/REn6FuIdixLNnQT+vKusE2hhTk2is3cFvv5wA+Sgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




    @yield('filejs')
</body>

</html>