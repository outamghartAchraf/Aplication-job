@if(Session::has('successRegister'))
    <div class="alert alert-success">{{Session::get('successRegister')}}</div>
@endif  

@if(Session::has('successpayment'))
    <div class="alert alert-success">{{Session::get('successpayment')}}</div>
@endif  



@if(Session::has('errorMessage'))
    <div class="alert alert-danger">{{Session::get('errorMessage')}}</div>
@endif  

@if(Session::has('errorpayment'))
    <div class="alert alert-danger">{{Session::get('errorpayment')}}</div>
@endif  