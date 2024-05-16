@extends('layouts.app')
@section('filecss')
<link rel="stylesheet" href="/fontawesome-free-6.4.2-web/css/all.min.css">

@endsection

@section('title','Register Seeker')

@section('content')

<div class="big_container">


    <div class="info-register ">
        <h1 class="title_register_seeker">Looking For a Job ?</h1>

        <h3 class="suntitle_register_seeker">please create account <i class="fa-solid fa-arrow-right"></i></h3>
        <div class="animation_seeker_register " id="animSeeker">
         </div>

    </div>

    <div class="register_seekre_form ">
        <div id="messageSuccess"></div> 
        <form class="form_register" method="post" action="#" id="RegisterformSeeker">
             
            <h1 class="h11">Register</h1>
            <div class="divname">
                <label for="fullname">Full name</label>
                <input type="text" name="name" class="tname">
                @if($errors->has('name'))
                <p style="color: red;" class="text-error">{{$errors->first('name')}}</p>
                @endif
            </div>

            <div class="divemail">
                <label for="email">Email</label>
                <input type="email" name="email" class="email">
                @if($errors->has('email'))
                <p style="color: red;" class="text-error">{{$errors->first('email')}}</p>
                @endif
            </div>

            <div class="divpassword">
                <label for="password">password</label>
                <input type="password" name="password" class="password">

               @if($errors->has('password')) 
                <p style="color: red;" class="text-error">{{$errors->first('password')}}</p>
               @endif
            </div>

            <button class="btn_register" id="btnRegister"  >Register</button>

        </form>
    </div>

</div>



@endsection


@section('filejs')
 <script>
    var url = "{{route('seeker.store')}}";
    document.getElementById('btnRegister').addEventListener("click",(even)=>{
    var RegisterformSeeker = document.getElementById('RegisterformSeeker');
    var messageSuccess = document.getElementById('messageSuccess');
    messageSuccess.innerHTML ="" ;
    var formdata = new FormData(RegisterformSeeker);

    var button = even.target ;
    button.disabled = true ;
    button.innerHTML = 'Sending Email...';

    fetch(url,{
        method:"POST",
        headers:{
            'X-CSRF-TOKEN' : '{{csrf_token()}}'
        },
        body:formdata
    }).then(res =>{
        if(res.ok){
            return res.json();
        }else{
            throw new Error('error');
        }
    }).then(data =>{
        button.innerHTML = "register";
        button.disabled = false ;
        messageSuccess.innerHTML = 
        '<div class="alert alert-success">please verification link send email !!</div>'
        RegisterformSeeker.style.display = "none" ;

    }).catch(err =>{
        button.innerHTML = "register" ;
        button.disabled = false ;
        messageSuccess.innerHTML = 
        '<div class="alert alert-danger">somthing wrong please try again !!</div>'

    })
    
    
    
    ;
        
    })

</script>

<script>
      var animation = bodymovin.loadAnimation({
            container: document.getElementById('animSeeker'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '/js/seeker.json'
      })
</script>



@endsection