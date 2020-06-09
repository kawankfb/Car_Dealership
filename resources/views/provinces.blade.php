@extends('master')

@section('title','provinces')

@section('content')

<div class="container" id="container">
      <div class="form-container sign-up-container">
        <form action="index.html" method="post">
          <h1>Create Account</h1>
          <input type="text" name="" placeholder="First name">
          <input type="text" name="" placeholder="Last name">
          <input type="email" name="" placeholder="Email">
          <input type="text" name="" placeholder="Phone number">
          <input type="password" name="" placeholder="Password">
          <input type="password" name="" placeholder="Confirm Password">
          @csrf

          <button type="submit" name="button">Sign Up</button>
        </form>
      </div>

      <div class="form-container sign-in-container">
        <form action="index.html" method="post">
          <h1>Sign in</h1>
          <input type="email" name="" placeholder="Email">
          <input type="password" name="" placeholder="Password">
          @csrf
          <a href="#">Forgot your password?</a>
          <button type="submit" name="button">Sign In</button>
        </form>
      </div>

      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your prsonal info</p>
            <button class="ghost" id="signIn" type="button" name="button">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and choose your wished car.</p>
            <button class="ghost" id="signUp" type="button" name="button">Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <script src="main.js" charset="utf-8"></script>
@endsection