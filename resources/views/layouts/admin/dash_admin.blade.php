<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('/css/styleDash.css')}}" />


    
    <!-- <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}"> -->
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('summernote/summernote-lite.css')}}">
    <link rel="stylesheet" href="{{asset('summernote/summernote.min.css')}}">
 



    yield('filecss')
</head>

<body>
    @include('sweetalert::alert')

    <div class="content" id="content">
        <nav>

            <h2 id="openmenu"><i class="fa-solid fa-bars"></i></h2>

            <div class="search-int">
                <i class="fa-solid fa-crown"></i>
                <H3>AchJob</H3>
            </div>
            <a href="" class="links">
                <span class="icon"><i class="fa-solid fa-bell"></i></span>
                <span class="num">20</span>

            </a>
        </nav>
    </div>

    <div class="bigcontainer">
        <div class="menu" id="menu">


            <div class="profile">
                <div class="box-img">
                    <img src="{{Storage::url(auth()->user()->profile_pic)}}" alt="">
                </div>
                <div>
                <h2>{{auth()->user()->name}}</h2>
                <a style="text-decoration: none;" href="{{route('user.profile')}}">view profile</a>
                </div>
                
            </div>

            <ul class="ul">

            @if(auth()->check() && auth()->user()->user_type === 'admin')

            <li>
                    <a href="{{route('admin')}}">
                        <i class="fas fa-home"></i>
                        <p>dashboard</p>
                    </a>
                </li>

            @else
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="fas fa-home"></i>
                        <p>dashboard</p>
                    </a>
                </li>

            @endif 
            
            @if(auth()->check() && auth()->user()->user_type === 'admin')

            <li>
                    <a href="{{route('admin.users')}}">
                        <i class="fas fa-users"></i>
                        <p>users</p>
                    </a>
                </li>

            @endif

                <li>
                    <a href="{{route('jobs.index')}}">
                    <i class="fa-solid fa-toolbox"></i>
                        <p>Jobs</p>
                    </a>

                   
                </li>

                 
                <li>
                    <a href="{{route('applicants.index')}}">
                        <i class="fas fa-table"></i>
                        <p>Applicants</p>
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="fas fa-chart-pie"></i>
                        <p>Chart</p>
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="fas fa-pen"></i>
                        <p>Post</p>
                    </a>
                </li>

               

                <li>
                    <a href="">
                        <i class="fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>

                <li class="log-out">
                    <a id="logout" href="#">
                        <i class="fas fa-sign-out"></i>
                        <p>Log Out</p>
                    </a>

                </li>
            </ul>
            <form id="formlogout" action="{{route('logout')}}" method="POST">@csrf</form>
        </div>

        <div class="cont2" id="cont2">
            <div style="margin-top: 20px; margin-left:30px; margin-right:30px;">

                @yield('content')


            </div>





        </div>
    </div>




     @yield('filescript')

    <script>
        let menu = document.getElementById('menu');
        let content = document.getElementById('content');
        let cont2 = document.getElementById('cont2');
        let openmenu = document.getElementById('openmenu');

        let menuVisible = true;
        let enableMouseOut = true;

        menu.addEventListener("mouseover", function() {
            if (menuVisible && enableMouseOut) {
                content.style.width = "calc(100% - 260px)";
                cont2.style.width = "calc(100% - 260px)";
            }
        });

        menu.addEventListener("mouseout", function() {
            if (menuVisible && enableMouseOut) {
                content.style.width = "calc(100% - 60px)";
                cont2.style.width = "calc(100% - 60px)";
            }
        });

        openmenu.addEventListener('click', function() {
            if (menuVisible) {
                content.style.width = "calc(100% - 260px)";
                cont2.style.width = "calc(100% - 260px)";
                menu.style.width = "260px";
                enableMouseOut = false; // Disable mouseout
            } else {
                content.style.width = "calc(100% - 60px)";
                cont2.style.width = "calc(100% - 60px)";
                menu.style.width = "60px";
            }
            menuVisible = !menuVisible;
        });
    </script>

    <script>
        let logout = document.getElementById('logout');
        let formlogout = document.getElementById('formlogout');

        logout.addEventListener("click", function() {
            formlogout.submit();
        })
    </script>

    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>




    <script src="{{asset('summernote/summernote.min.js')}}"></script>
    <script src="{{asset('summernote/summernote-lite.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 

  <script>
    $(document).ready(function() {
  $('.summernote').summernote();
});
  </script>



</body>

</html>