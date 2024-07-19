@extends('layouts.guest')
@section('guest-layout')
<header data-bs-theme="light">
</header>
<main class="fashion_section">
  <div class="container ">
    <div class="b-example-divider"></div>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    @include('alert.alert')
      <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
          <p class="col-lg-10 fs-4">
            <img src="{{asset('images/banner-bg.png')}}" class="d-block mx-lg-auto img-fluid" alt="Jomaka Horizons Kenya" width="700" height="500" loading="lazy" style="border-radius: 8px;">
          </p>
          <p class="col-lg-10 fs-4">
            <h2>Sign up!</h2>
            Jomaka Horizons Kenya values your data privacy and we provide protection against any unauthorized access. to find out more about our terms and conditions click the link below<br>
            <b><a href="/terms-and-conditions/">Terms and Conditions of use.</a></b>
          </p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
          <form method="POST" action="{{ route('register') }}" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
             @csrf
            <div class="form-floating mb-3">
              <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="form-control">
              <label for="floatingInput">User Name</label>
              <x-input-error :messages="$errors->get('name')" class="text-danger" />
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" :value="old('email')" required autofocus autocomplete="username">
              <label for="floatingInput">Email address</label>
              <x-input-error :messages="$errors->get('email')" class="text-danger" />
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" required autocomplete="current-password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
              <x-input-error :messages="$errors->get('password')" class="text-danger" />
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password_confirmation" required autocomplete="current-password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Confirm Password</label>
              <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger" />
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            <hr class="my-4">
            <small class="text-body-secondary">
              @if (Route::has('password.request'))
                <a href="{{ route('login') }}">
                    {{ __('Login instead.') }}
                </a>
              @endif
            </small>
          </form>
        </div>
      </div>
    </div>

    <div class="b-example-divider"></div>
  </div>
</main>
@endsection