@extends('master')

@section('title','auth')

@section('content')
<style>*{
  box-sizing: border-box;
}

body{
  font-family: 'Roboto' , sans-serif;
  background: #f6f5f7;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: -20px 0 50px;
}

h1{
  font-weight: bold;
  margin: 20px 0;
}

p{
  font-size:14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
}

a{
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}


.container{
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  position: relative;
  overflow: hidden;
  width: 868px;
  max-width: 100%;
  min-height: 580px;
}

.form-container form{
  background: #fff;
  display: flex;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.form-container input{
  background: #fff;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
  border-bottom: 1px solid #ccc;
  outline: none;
}

button{
  border-radius: 20px;
  border: 1px solid #c70000;
  background: #c70000;
  color: #fff;
  font-size: 12px;
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
  padding: 10px 20px;
  margin: 30px 0;
}

button:active{
  transform:scale(0.95);
}

button:focus{
  outline: none;
}

button.ghost{
  background: transparent;
  border-color: #fff;
}

.form-container{
  position: absolute;
  top: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}

.sign-in-container{
  left: 0;
  width: 50%;
  z-index: 2;
}

.sign-up-container{
  left: 0;
  width: 50%;
  opacity: 0;
  z-index: 1;
}

.overlay-container{
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}

.overlay{
  background: linear-gradient(to right, #ae0000, #c70000) no-repeat 0 0 / cover;
  color: #fff;
  position: relative;
  left: -100%;
  height: 100%;
  /* 200% * 50% = 100% */
  width: 200%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.overlay-panel{
  position: absolute;
  top: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0 40px;
  height: 100%;
  width: 50%;
  text-align: center;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.overlay-right{
  right: 0;
  transform: translateX(0);
}

.overlay-left{
  transform: translateX(-20%);
}

/* Animation */

/* move signin to the right */
.container.right-panel-active .sign-in-container{
  transform: translateX(100%);
}

/* move overlay to the left */
.container.right-panel-active .overlay-container{
  transform: translateX(-100%);
}

/* bring sign up over sign in */
.container.right-panel-active .sign-up-container{
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
}

/* move overlay back to the right */
.container.right-panel-active .overlay{
  transform: translateX(50%);
}

.container.right-panel-active .overlay-left{
  transform: translateX(0);
}

.container.right-panel-active .overlay-right{
  transform: translateX(20%);
}
</style>
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

    <script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', function(){
  container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', function(){
  container.classList.remove('right-panel-active');
});
</script>
@endsection