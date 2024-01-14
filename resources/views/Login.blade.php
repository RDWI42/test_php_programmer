@extends('app')

@section('title', 'Login')
<style>
    .boxtable-login {
        border-radius: 10px;
        box-shadow: 1px 1px 10px 1px;
        position: relative;
        width: 50%;
        background-color: white
    }
</style>
@section('content')
<div class="container mt-5">
    <div class="row boxtable-login" style="margin:auto; padding:20px">
        <div class="col-md-12">
            <h3>Login</h3>
            <hr>
        </div>
        
        <form action="/" method="post" class="col-md-12">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
    
            <hr>
            <a href="{{url('/signup')}}" class="btn btn-success">Sign Up</a>
            <button type="submit" class="btn btn-info" style="float:right">Login</button>
        </form>
    </div>
</div>
@endsection