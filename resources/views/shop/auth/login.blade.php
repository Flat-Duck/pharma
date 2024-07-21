@extends('layouts.shop.guest')
@section('content')
<section class="signup p-40 mb-64">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="form-block bg-lightest-gray">
                    <h3 class="mb-48">{{ __('تسجيل الدخول') }}</h3>
                    <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mb-24">
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" required placeholder="{{ __('البريد الالكتروني') }}">
                            @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-24">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" id="password" required placeholder="{{ __('كلمة المرور') }}">
                            @error('password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <button type="submit" class="b-unstyle cus-btn w-100 mb-24">
                            <span class="icon"><img src="{{ asset("assets/media/icons/click-button.png")}}" alt=""></span>{{ __('تسجيل الدخول') }}
                        </button>
                    </form>
                    {{-- <div class="register-bottom">
                        <h6>If you don’t have account? <a href="signup.html" class="color-primary">Register</a></h6>
                        <h6 class="text-end"><a href="signup.html" class="color-primary">Forgot Password?</a></h6>
                    </div> --}}
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="sign-up-image bg-lightest-gray br-30 box-shadow">
                    <img src="/pharma.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
