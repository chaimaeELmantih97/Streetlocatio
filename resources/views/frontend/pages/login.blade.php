@extends('frontend.layouts.master')

@section('title','E-Shop || Login Page')

@section('main-content')

<style>
    .login-container {
        width: 100vw;
        height: 100vh;
        margin: 0;
    }

    .login-logo {
        position: relative;
        margin-left: -41.5%;
    }

    .login-logo img {
        position: absolute;
        width: 20%;
        margin-top: 25%;
        background: #282726;
        border-radius: 4.5rem;
        padding: 5%;
    }

    .login-form-1 {
        padding: 9%;
        background: #282726;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        height: 100vh;
    }

    .login-form-1 h3 {
        margin-top: 20%;
        text-align: center;
        margin-bottom: 12%;
        color: #fff;
    }

    .login-form-2 {
        padding: 9%;
        background: #D42B12;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        height: 100vh;
    }

    .login-form-2 h3 {
        margin-top: 20%;
        text-align: center;
        margin-bottom: 12%;
        color: #fff;
    }

    .btnSubmit {
        font-weight: 600;
        width: 50%;
        color: #282726;
        background-color: #fff;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
    }

    .btnForgetPwd {
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }

    .btnForgetPwd:hover {
        text-decoration: none;
        color: #fff;
    }

    .logomovement{
        animation: slidein 1s ease-in infinite ;
    }
    @keyframes slidein {
        0% {
            margin-left: 0px;
        }

        50% {
            margin-left: 10px;
        }

        100% {
            margin-left: 0px;
        }
    }
</style>
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>S'identifier</h3>
            <form role="form" id="login" method="post" action="{{route('login.submit')}}" class="login-form">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="email" value="{{old('email')}}"
                        placeholder="L'Email..." />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" required placeholder="Mot de Passe..."
                        value="{{old('password')}}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                    <a href="{{url('resetpassword')}}" class="btnForgetPwd">Forget Password?</a>
                </div>
            </form>

        </div>
        <div class="col-md-6 login-form-2">
            @php
            $settings=DB::table('settings')->get();
            @endphp
            @foreach($settings as $data)

            <div class="login-logo">
                <img src="{{url('storage/settings/'.$data->logo)}}" class="logomovement" alt="" />
            </div>
            @endforeach

            <h3>s'inscrire</h3>
            <form role="form" id="login" method="post" action="{{route('register.submit')}}"class="login-form">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="{{old('name')}}"
                        placeholder="Nom et prenom..." />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" value="{{old('email')}}"
                        placeholder="L'Email..." />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" required placeholder="Mot de Passe..."
                        value="{{old('password')}}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="register" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
