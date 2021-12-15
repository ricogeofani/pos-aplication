@extends('layouts.app')

@section('content')

<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href=""><b>Aplication</b>POS</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body bg-dark">
          <p class="login-box-msg">Halaman Register</p>
          <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <div class="col-md-10">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="fullname" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
                <div class="col-md-10">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="email" autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
                <div class="col-md-10">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="password" autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
                <div class="col-md-10">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="password confirmation" autocomplete="new-password">
                </div>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
              <div class="col-md-11">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
              </div>
          </form>
          <p class="mb-1">
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
          </p>
          <p class="mb-0">
            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    @endsection

