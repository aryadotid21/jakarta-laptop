@extends('layouts.app')

@section('content')
    <div class="card-body">
        <div class="container">
            <div class="row no-gutter">
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image" data-aos="fade-right" data-aos-duration="1250"
                    data-aos-delay="750"></div>
                <div class="col-md-8 col-lg-6" data-aos="fade-left" data-aos-duration="1250" data-aos-delay="750">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <a href="{{ route('index') }}" class="navbar-brand font-weight-bold"
                                        style="color:#3C4858;">Jakarta
                                        <span class="text-info">Laptop</span></a>
                                    <h3 class="login-heading mb-4">Register new user</h3>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-label-group">
                                            <input type="text" name="name" id="inputName"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Full Name" required autofocus>
                                            <label for="inputName">Full Name</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <input type="email" name="email" id="inputEmail"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email address" required autofocus>
                                            <label for="inputEmail">Email address</label>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <input type="number" name="phone" id="inputPhone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Phone Number" required autofocus>
                                            <label for="inputPhone">Phone Number</label>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <input type="password" name="password" id="inputPassword"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" required>
                                            <label for="inputPassword">Password</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <input type="password" name="password_confirmation" id="inputPasswordConfirm"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" required>
                                            <label for="inputPasswordConfirm">Password Confirmation</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button
                                            class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                            type="submit">Sign up</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
