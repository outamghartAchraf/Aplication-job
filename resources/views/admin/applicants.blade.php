@extends('layouts.admin.dash_admin')


@section('title',"Applicants")
@section("content")

<div class="jobs_table">
    <div class="info_jobs_table">
        <h1>Jobs</h1>
      </div>
    <div class="jobs_search">
        <div>
            <h4>Your a Job</h4>
        </div>
        <div>
            <form action="{{route('jobs.index')}}" method="GET">@csrf
                <input class="inpseach" name="search" type="text" value="{{ request('search') }}" placeholder="Search">
                <button class="btn_search"><i class="fa-solid fa-magnifying-glass"></i></button>

            </form>
        </div>
    </div>
    <table class="table_jobs">

        <thead>
            <tr>
                <th>Title</th>
                <th>Created on</th>
                <th>Total Applicants</th>
                <th>Views Job</th>
                <th>Views applicants</th>
            </tr>

        </thead>

        <tbody>
        @foreach($listengs as $listeng)
            <tr>
                <td>{{$listeng->title}}</td>
                <td>{{$listeng->created_at->format('Y-m-d')}}</td>
                <td>{{$listeng->users->count()}}</td>
                <td >
                    view job
                </td>
                <td>
                <a class="btn_edit" href="{{route('admin.datails.applicants',$listeng->id)}}">show</a>

                </td>  
            </tr>

            @endforeach
        </tbody>
    </table>
 
</div>


@endsection

@section('filescript')
 

@endsection