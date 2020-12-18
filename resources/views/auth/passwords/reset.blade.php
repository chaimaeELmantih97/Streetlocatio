@extends('frontend.layouts.master')

@section('title','StreetLocatio|| Blog Detail page')

@section('main-content')

<div class="block-title">
    <div class="block-title__inner section-bg section-bg_second">
        <div class="bg-inner">
            <h1 class="ui-title-page">Réinitialisation du mot de passe</h1>
            <div class="decor-1 center-block"></div>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">HOME</a></li>
                <li class="active">Réinitialisation du mot de passe</li>
            </ol>
        </div><!-- end bg-inner -->
    </div><!-- end block-title__inner -->
</div><!-- end block-title -->
<div class="container" style="background: #F5F5F5">
    <div class="row justify-content-center">
        <div class="col-md-2" style="height: 0px"></div>

        <div class="col-md-8">
            <div class="card" style="background: #F5F5F5">

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" disabled name="email2" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                <input id="email" type="email" hidden   name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2" style="height: 0px"></div>

    </div>
</div>
@endsection
