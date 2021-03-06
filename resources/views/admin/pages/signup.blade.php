@extends('admin.master')

@section('app')
<div class="peers ai-s fxw-nw h-100vh">
    <div class="peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style='background-image: url({!! asset("assets/static/images/bg.jpg") !!})'>
        <div class="pos-a centerXY">
            <div class="bgc-white bdrs-50p pos-r" style='width: 120px; height: 120px;'>
                <img class="pos-a centerXY" src={!! asset('assets/static/images/logo.png') !!} alt="">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style='min-width: 320px;'>
        <h4 class="fw-300 c-grey-900 mB-40">Register</h4>
        <form action="" method="post">
            {!! Form::token() !!}
            <div class="form-group">
                <label class="text-normal text-dark">Username</label>
                <input type="text" class="form-control" Placeholder='John Doe' name="username">
            </div>
            <div class="form-group">
                <label class="text-normal text-dark">Email Address</label>
                <input type="email" class="form-control" Placeholder='name@email.com' name="email">
            </div>
            <div class="form-group">
                <label class="text-normal text-dark">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="form-group">
                <label class="text-normal text-dark">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Password" name="repassword">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection