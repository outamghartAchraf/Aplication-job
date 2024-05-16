@extends('layouts.app')
@section('filecss')

@endsection

@section('title','Job apllies')
@section('content')

<section class="bigdiv_applicants">
    <div class="bigdiv_applicants">

        @foreach($jobs->listengs as $job)
        <div class="card_applicants">
            <div class="div_compose_info_btn">

                <div class="secound_applicants">
                    <div class="box_image_applicants">
                        <img src="{{Storage::url($job->feature_image)}}" alt="image applicants">
                    </div>
                    <div class="info_applicants">
                        <h3>{{$job->title}}</h3>

                        <p>
                            {{$job->pivot->created_at}}
                        </p>
                    </div>

                </div>

                <div class="btn_applicants">
                    <form method="POST" action="{{route('annuler.apply',$job->id)}}">
                        @method('DELETE')
                        @csrf
                        <a href="{{route('jobs.show',$job->slug)}}" class="btn btn-outline-primary">View</a>
                        <button type="submit" class="btn btn-outline-danger">
                            Annuller
                        </button>
                    </form>
                </div>

            </div>
        </div>
        @endforeach
</section>



@endsection


@section('filejs')
 
 

@endsection