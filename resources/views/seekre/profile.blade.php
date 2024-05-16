@extends('layouts.app')


@section('title',"Profile")
@section("content")

<div class="contbigprofile">
    <div class="sec_profile1">
        <div class="box_image_profile">
            @if(auth()->user()->profile_pic)
            <img src="{{Storage::url(auth()->user()->profile_pic)}}" alt="profile">
            @endif
        </div>
        <h2>{{auth()->user()->name}} </h2>
        <p>{{auth()->user()->email}}</p>

    </div>

    <div class="sec_profile2">
        <h2>Edit Profile</h2>
        <form method="POST" action="{{route('user.update.profile')}}" enctype="multipart/form-data">@csrf

           <div>
           <label for="profile_pic">Image Profile:</label>
            <div class="file-input-container">

                <input type="file" id="profile_pic" name="profile_pic" class="file-input" />
                <label for="profile_pic" class="custom-file-label">
                    <span class="icon"><i class="fas fa-upload"></i></span>
                    Upload Image
                </label>
            </div>
           </div>

            @if($errors->has('profile_pic'))
            <div style="color: red;" class="messageErour">{{$errors->first('profile_pic')}}</div>

            @endif
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{auth()->user()->name}}" id="name" placeholder="Your Name">
            </div>

            @if($errors->has('name'))
            <div style="color: red;" class="messageErour">{{$errors->first('name')}}</div>

            @endif

            <button class="btn_update_profile">Update</button>
        </form>

        <form method="post" action="{{route('upload.resum')}}" enctype="multipart/form-data">@csrf
        <div>
           <label for="profile_pic">Upload a Resume:</label>
            <div class="file-input-container">

                <input type="file" id="resume" name="resume" class="file-input" />
                <label for="profile_pic" class="custom-file-label">
                    <span class="icon"><i class="fas fa-upload"></i></span>
                    Upload Resume
                </label>
            </div>
           </div>
           <button class="btn_update_profile">update Resume</button>
        </form>
    </div>


    <div class="sec_profile3">

    <h2>Change Password</h2>
        <form method="POST" action="{{route('user.password')}}">@csrf

           
            <div>
                <label for="current_password">Your Current password:</label>
                <input type="password" name="current_password" id="current_password" placeholder="current password">
            </div>

            @if($errors->has('current_password'))
            <div style="color: red;" class="messageErour">{{$errors->first('current_password')}}</div>

            @endif

            <div>
                <label for="password">Your New Password:</label>
                <input type="password" name="password" id="password" placeholder="password">
            </div>

            @if($errors->has('password'))
            <div style="color: red;" class="messageErour">{{$errors->first('password')}}</div>

            @endif


            <div>
                <label for="confirmer_password">Confirmer Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password confirmation">
            </div>

            @if($errors->has('confirmer_password'))
            <div style="color: red;" class="messageErour">{{$errors->first('name')}}</div>

            @endif

            <button  class="btn_update_profile">Update</button>
        </form>

    </div>
</div>



@endsection

@section('filescript')


@endsection