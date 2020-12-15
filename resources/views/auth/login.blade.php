@extends('frontend.layouts.master')

@section('title','E-Shop || Login Page')

@section('main-content')
<!-- Breadcrumbs -->
<style>
    img {
        max-width: 100%;
    }

    ::-moz-selection {
        background: #19b9e7;
        color: #fff;
        text-shadow: none;
    }

    ::selection {
        background: #19b9e7;
        color: #fff;
        text-shadow: none;
    }


    .btn-link-1 {
        display: inline-block;
        height: 50px;
        margin: 5px;
        padding: 16px 20px 0 20px;
        background: #19b9e7;
        font-size: 16px;
        font-weight: 300;
        line-height: 16px;
        color: #fff;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }

    .btn-link-1:hover,
    .btn-link-1:focus,
    .btn-link-1:active {
        outline: 0;
        opacity: 0.6;
        color: #fff;
    }

    .btn-link-1.btn-link-1-facebook {
        background: #4862a3;
    }

    .btn-link-1.btn-link-1-twitter {
        background: #000000;
    }

    .btn-link-1.btn-link-1-google-plus {
        background: #dd4b39;
    }

    .btn-link-1 i {
        padding-right: 5px;
        vertical-align: middle;
        font-size: 20px;
        line-height: 20px;
    }

    .btn-link-2 {
        display: inline-block;
        height: 50px;
        margin: 5px;
        padding: 15px 20px 0 20px;
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid #fff;
        font-size: 16px;
        font-weight: 300;
        line-height: 16px;
        color: #fff;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }

    .btn-link-2:hover,
    .btn-link-2:focus,
    .btn-link-2:active,
    .btn-link-2:active:focus {
        outline: 0;
        opacity: 0.6;
        background: rgba(0, 0, 0, 0.3);
        color: #fff;
    }


    /***** Top content *****/

    .inner-bg {
        padding: 60px 0 80px 0;
    }

    .top-content .description {
        margin: 20px 0 10px 0;
    }

    .top-content .description a:hover,
    .top-content .description a:focus {
        border-bottom: 1px dotted #19b9e7;
    }

    .form-box {
        margin-top: 10px;
    }

    .form-top {
        overflow: hidden;
        padding: 0 25px 15px 25px;
        background: #f3f3f3;
        -moz-border-radius: 4px 4px 0 0;
        -webkit-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
        text-align: left;
    }

    .form-top-left {
        float: left;
        width: 75%;
        padding-top: 25px;
    }

    .form-top-left h3 {
        margin-top: 0;
    }

    .form-top-right {
        float: left;
        width: 25%;
        padding-top: 5px;
        font-size: 66px;
        color: #ddd;
        line-height: 100px;
        text-align: right;
    }

    .form-bottom {
        padding: 25px 25px 30px 25px;
        background: #eee;
        -moz-border-radius: 0 0 4px 4px;
        -webkit-border-radius: 0 0 4px 4px;
        border-radius: 0 0 4px 4px;
        text-align: left;
    }

    .form-bottom form textarea {
        height: 100px;
    }

    .form-bottom form button.btn {
        width: 100%;
    }

    .form-bottom form .input-error {
        border-color: #19b9e7;
    }

    .social-login {
        margin-top: 35px;
    }

    .social-login-buttons {
        margin-top: 25px;
    }

    .middle-border {
        min-height: 300px;
        margin-top: 170px;
        border-right: 1px solid #ddd;
    }


    /***** Footer *****/

    footer {
        padding-bottom: 70px;
    }

    footer .footer-border {
        width: 200px;
        margin: 0 auto;
        padding-bottom: 30px;
        border-top: 1px solid #ddd;
    }

    footer a:hover,
    footer a:focus {
        border-bottom: 1px dotted #19b9e7;
    }


    /***** Media queries *****/

    @media (min-width: 992px) and (max-width: 1199px) {}

    @media (min-width: 768px) and (max-width: 991px) {}

    @media (max-width: 767px) {

        .middle-border {
            min-height: auto;
            margin: 65px 30px 0 30px;
            border-right: 0;
            border-top: 1px solid #ddd;
        }

    }

    @media (max-width: 415px) {

        h1,
        h2 {
            font-size: 32px;
        }

    }

</style>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login / Register</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row d-flex justify-content-center align-item-center">
                <div class="col-sm-6">
                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>{{__('messages.Loginsite',[],Session::get('locale'))}}</h3>
                                <p>{{__('messages.log2',[],Session::get('locale'))}}</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" id="login" method="post" action="{{route('login.submit')}}"
                                class="login-form">
                                @csrf
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Username</label>
                                    <input type="text" name="email" required placeholder="Username..."
                                        value="{{old('email')}}" class="form-username form-control" id="form-username">
                                    {{-- <input type="email"  placeholder="" required="" > --}}
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" required placeholder="Password..."
                                        value="{{old('password')}}" class="form-password form-control"
                                        id="form-password">
                                    {{-- <input type="password"  placeholder="" ="required" > --}}
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit"  class="btn">{{__('messages.Log3',[],Session::get('locale'))}}</button>
                            </form>
                        </div>
                    </div>

                    <div class="social-login">
                        <h3>{{__('messages.Log4',[],Session::get('locale'))}}</h3>
                        <div class="social-login-buttons">
                            <a class="btn btn-link-1 btn-link-1-facebook" href="{{route('login.redirect','facebook')}}">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-1 btn-link-1-twitter" href="{{route('login.redirect','github')}}">
                                <i class="fa fa-github"></i> Github
                            </a>
                            <a class="btn btn-link-1 btn-link-1-google-plus"
                                href="{{route('login.redirect','google')}}">
                                <i class="fa fa-google-plus"></i> Google Plus
                            </a>
                        </div>
                    </div>

                </div>

                {{-- <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-1"></div> --}}

                
            </div>

        </div>
    </div>

</div>
@endsection
