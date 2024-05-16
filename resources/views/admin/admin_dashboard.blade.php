@extends('layouts.admin.dash_admin')
@section('filecss')
<link rel="stylesheet" href="{{asset('/fontawesome-free-6.4.2-web/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/styleDash.css')}}" />
@endsection



@section('content')

<div class="home">

    <div class="box ">
        <div class="bbox">
            <i id="bx" class="fas fa-user-group bx1"></i>

        </div>
        <div class="data-info">
            <p>All Jobs</p>
            <span>{{\App\Models\User::count() }}</span>

        </div>
    </div>

    <div class="box bx2">
        <div class="bbox1">
            <i id="bx1" class="fas fa-dollar bx1"></i>
        </div>

        <div class="data-info">
            <p>Plan</p>
           
            <span>90500$</span>
          
        </div>
    </div>

    <div class="box bx3">
        <div class="bbox2">
            <i id="bx3" class="fas fa-table"></i>
        </div>
        <div class="data-info">
            <p>Applicants</p>
            <span>
             {{\App\Models\Listeng::count()}}
             </span>

        </div>
    </div>

    <div class="box bx4">
        <div class="bbox3">
            <i id="bx4" class="fas fa-pen"></i>
        </div>
        <div class="data-info">
            <p>Post</p>
            <span>
            {{\App\Models\Listeng::count()}}
            </span>
        </div>
    </div>
</div>


<div class="bigchart">
    <div class="chart" style="width:50%;">
        {!! $chart->container() !!}
    </div>
    {!! $chart->script() !!}
    <div class="chart2" style="width:50%;">
        {!! $chart2->container() !!}
    </div>
    {!! $chart2->script() !!}
</div>

<div class="chart2" style="width:100%;">
        {!! $chart3->container() !!}
    </div>
    {!! $chart3->script() !!}

@endsection