@extends('layouts.app')
@section('filecss')

@endsection

@section('title','Home')
@section('content')

<section class="show_jobs_listeng  ">

    <div class="info_company">
        <div class=" ">
            <img src="{{Storage::url($company->profile_pic)}}" alt="image jobs" width="200px">

        </div>


        <h3 class="">{{$company->name}}</h3>
         <h4>About</h4>
        <p class="about_company" style="text-align: center;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt assumenda recusandae consequatur doloribus molestias ipsa adipisci? Ipsum assumenda, facilis omnis fugiat nihil
             laudantium voluptatem optio, consectetur, tempore est at deserunt?
        </p>

        <h2>jobs</h2>
    </div>

    <div class="section_card_job" style="justify-content: center;">


        @foreach($company->jobs as $job)
        <div class="card_job" style="width: 300px;">

            <div class="{{$job->job_type}}">
                {{$job->job_type}}
            </div>


            <div class="logo_and_title">
                <div class="box_logo">
                    <img src="{{Storage::url($job->profile->profile_pic)}}">
                </div>

                <div class="title_jobss">{{$job->title}}</div>
            </div>
            <hr>

            <div class="name">{{$job->profile->name}}</div>

            <div class="price_job_and_apply">
                <div class="price">${{ number_format($job->salary) }}</div>

                <div class="btnbtn">
                    <a href="{{route('jobs.show',$job->slug)}}" class="btn_apply_job">Apply</a>
                </div>

            </div>
        </div>

        @endforeach

    </div>


</section>



@endsection


@section('filejs')


@endsection