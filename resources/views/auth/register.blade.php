@extends('header')
@section('link')
    <link rel="stylesheet" href="css/register.css">
@endsection()
@section('content')
    <br>
    <br>
<div class="container right-panel-active" id="container">
    <div class="form-container sign-up-container">
        <form action="{{route('register')}}" method="post">
            @csrf
            <h1>Create Account</h1>
            <input type="text" name="name" placeholder="First name">
            <input type="text" name="lastname" placeholder="Last name">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="phone" placeholder="Phone number">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirmation" placeholder="Confirm Password">

            <button type="submit" name="button">Sign Up</button>
        </form>
    </div>

    <div class="form-container sign-in-container">
        <form action="{{route('login')}}" method="post">
            @csrf
            <h1>Sign in</h1>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
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
    <br>
    <br>
@endsection()
