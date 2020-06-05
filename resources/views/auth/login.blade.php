@extends('layouts.app')

@section('content')
<div class="container">
    <div class="sidenav">
        <div class="main-text">
            <h2>Application<br> Login Page</h2>
            <p class="text-light"><a class="text-white d-inline-block text-decoration-none font-weight-bold" href="{{ route('login') }}">Login</a> or <a class="text-white d-inline-block text-decoration-none font-weight-bold" href="{{ route('register') }}">Register</a> from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label>E-Mail Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-blue">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
