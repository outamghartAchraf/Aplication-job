@extends('layouts.app')
@section('filecss')
<link rel="stylesheet" href="{{asset('/fontawesome-free-6.4.2-web/css/all.min.css')}}">

@endsection



@section('content')
@if(Session::has('error'))
<div class="alert alert-warning">{{Session::get('error')}}</div>
@endif
 <div class="pricing">
            <div class="card">
                <div class="content">
                    <h4>Weekly Plan</h4>
                    <h3>$20</h3>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Smart coding plan
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        At home workouts
                    </p>
                </div>
                
                <a href="{{route('sub.weekly')}}" class="btn">Join Now</a>
            
           
            </div>
            <div class="card">
                <div class="content">
                    <h4>Monthly Plan</h4>
                    <h3>$80</h3>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Pro codes
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Smart coding plan
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        At home workouts
                    </p>
                </div>
                <a href="{{route('sub.monthly')}}" class="btn">Join Now</a>
            </div>
            <div class="card">
                <div class="content">
                    <h4>Yearly Plan</h4>
                    <h3>$200</h3>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Elite Classes & Courses
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Pro codes
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Personal Coaching
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Smart coding plan
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        At home workouts
                    </p>
                </div>
                <a href="{{route('sub.yearly')}}" class="btn">Join Now</a>
            </div>
        </div>


@endsection