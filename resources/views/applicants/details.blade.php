@extends('layouts.admin.dash_admin')


@section('title',"Detials Applicants")
@section("content")

<div class="title_job">
   <h1>{{$listengs->title}}</h1>
</div>
<div class="bigdiv_applicants">

   @foreach($listengs->users as $applicant)
   <div class="{{$applicant->pivot->shortlisted ? 'card_applicants bg_applicants ' : 'card_applicants'}}">  
      <div class="div_compose_info_btn">

         <div class="secound_applicants">
            <div class="box_image_applicants">
               <img src="{{Storage::url($applicant->profile_pic)}}" alt="image applicants">
            </div>
            <div class="info_applicants">
               <h3>{{$applicant->name}}</h3>
               <p>
                  {{$applicant->email}}
               </p>
               <p>
                  {{$applicant->pivot->created_at}}
               </p>
            </div>

         </div>

         <div class="btn_applicants">
            <form method="POST" action="{{route('Applicants.shortlist',[$listengs->id,$applicant->id])}}">@csrf
               <a href="{{Storage::url($applicant->resume)}}" target="_blank" class="donl_file">Donlwoard</a>
               <button type="submit" class="btn_apply">
                  {{$applicant->pivot->shortlisted ? 'shortlisted' : 'shordlist'}}
               </button>
            </form>
         </div>

      </div>
   </div>
   @endforeach
</div>







</div>


@endsection

@section('filescript')


@endsection