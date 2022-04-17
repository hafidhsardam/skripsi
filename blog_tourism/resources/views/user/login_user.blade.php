@extends('user.index')
@section('content')
<style>
    html,
    body {
        height: 100%;
        background-image:url("{{asset('assets/banner.jpg')}}");
    }

    .form-signin {
        position: absolute;
        padding: 50px;
        width: 550px;
        height: 500px;
        left: 520px;
        top: 230px;

        background: #FFFFFF;
        /* 1 */

        box-shadow: 0px 16px 24px rgba(0, 0, 0, 0.06), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04);
        border-radius: 19.0044px;
        
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
   
    .btn-block{
        background-color:black;
    }

    
</style>
<div>
        
                
         
        <form class="form-signin" method="post" action="{{ URL('login_validation') }}">
            @csrf
            <center>
                <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            </center>
            @if ($message = Session::get('alert-login'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Login Sebagai</label>
                <select class="form-control" name="login_as" style="padding: 5px;font-size: 14px;">
                    <option value="1">User</option>
                    <option value="2">Admin</option>
                </select>
                <div class="invalid-feedback">
                    {{ $errors->first('login_as') }}
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email" class="form-control <?= ($errors->first('email') != "") ? 'is-invalid' : ''; ?>" id="exampleInputEmail1">
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control <?= ($errors->first('password') != "") ? 'is-invalid' : ''; ?>" id="exampleInputPassword1">
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" >Login</button>
            <center>
                <h1 class="h4 mb-1 font-weight-normal">© 2022 PURCHASH ERP</h1>
            </center>
        </form>
</div>
@endsection