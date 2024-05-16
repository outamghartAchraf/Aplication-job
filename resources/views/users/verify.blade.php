@extends('layouts.app')
@section('filecss')
<link rel="stylesheet" href="{{asset('/fontawesome-free-6.4.2-web/css/all.min.css')}}">

@endsection



@section('content')

 <div class="alert alert-primary">
    <h1>Verifier account</h1>
    <p>your acount not verified</p>
    <a class="btn btn-primary" href="{{route('verification.reset')}}">Resend Verification Email</a>
 </div>


@endsection