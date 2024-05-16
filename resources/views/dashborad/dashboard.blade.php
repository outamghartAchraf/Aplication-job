@extends('layouts.admin.dash_admin')
@section('filecss')
<link rel="stylesheet" href="{{asset('/fontawesome-free-6.4.2-web/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/styleDash.css')}}" />
@endsection



@section('content')



<h3>Welcome {{auth()->user()->name}}</h3>


@if(! auth()->user()->billing_ends)
@if(Auth::check() && auth()->user()->user_type === 'employer')
<p>Your trial {{ now()->format('Y-m-d') > auth()->user()->user_trial ? 'has expired' : 'will expire' }} on {{ auth()->user()->user_trial }}</p>
@endif
@endif

@if(auth()->user()->billing_ends)
@if(Auth::check() && auth()->user()->user_type === 'employer')
<p>Your membreship {{ now()->format('Y-m-d') > auth()->user()->billing_ends ? 'has expired' : 'will expire' }} on {{ auth()->user()->billing_ends }}</p>
@endif
@endif
@include('message')

<div class="home">

    <div class="box ">
        <div class="bbox">
            <i id="bx" class="fas fa-user-group bx1"></i>

        </div>
        <div class="data-info">
            <p>All Jobs</p>
            <span>{{\App\Models\Listeng::where('user_id', auth()->id())->count() }}</span>

        </div>
    </div>

    <div class="box bx2">
        <div class="bbox1">
            <i id="bx1" class="fas fa-dollar bx1"></i>
        </div>

        <div class="data-info">
            <p>Plan</p>
            @if(\App\Models\User::where('id', auth()->id())->exists())
            <span>{{ \App\Models\User::where('id', auth()->id())->first()->plan }}</span>
            @else
            <span>No plan found</span>
            @endif
        </div>
    </div>

    <div class="box bx3">
        <div class="bbox2">
            <i id="bx3" class="fas fa-table"></i>
        </div>
        <div class="data-info">
            <p>Applicants</p>
        @if(auth()->user()->user_type === 'seeker')    
            <span>
                {{ \App\Models\Listeng::latest()->withCount('users')->where('user_id', auth()->user()->id)->first()->users_count }}
            </span>
        @endif    

        </div>
    </div>

    <div class="box bx4">
        <div class="bbox3">
            <i id="bx4" class="fas fa-pen"></i>
        </div>
        <div class="data-info">
            <p>Post</p>
            <span>3000</span>
        </div>
    </div>
</div>


<div class="bigchart"  >
    <div class="chart" style="width:50%;">
        {!! $chart->container() !!}
    </div>
    {!! $chart->script() !!}
    <div class="chart2" style="width:50%;">
        {!! $chart2->container() !!}
    </div>
    {!! $chart2->script() !!}
</div>
 

<div class="chart2" style="width:50%;">
        {!! $chart3->container() !!}
    </div>
    {!! $chart3->script() !!}


@endsection