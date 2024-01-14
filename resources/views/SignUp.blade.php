@extends('app')

@section('title', 'Sign Up')
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
            <h3>Sign Up</h3>
            <hr>
        </div>
        
        <div class="col-md-12">
            <form action="/AddUser" method="post">
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
                <a href="{{url('/')}}" class="btn btn-success">Login</a>
                <button class="btn btn-info" style="float:right">Sign Up</button>
            </form>
        </div>
    </div>
</div>
@endsection