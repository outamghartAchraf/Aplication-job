@extends('layouts.app')
@section('filecss')
<link rel="stylesheet" href="/fontawesome-free-6.4.2-web/css/all.min.css">

@endsection

@section('title','Login')
@section('content')

 <div class="big_container1 ">

 <div class="register_seekre_form  " style="margin-top: 40px;">
        @include('message')
         <form class="form_register" method="post" action="{{route('login.store')}}">
            @csrf
            <h1 class="h11">Login</h1>
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

            <a href="dsfsdfsdfsd ">dfsdfdsfsdf</a>

            <button class="btn_register" type="submit">Login</button>

        </form>
    </div>

</div>

 
@endsection


@section('filejs')

<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

@endsection