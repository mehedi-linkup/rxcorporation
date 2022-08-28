<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<link rel="stylesheet" href="{{ asset('admin/css/login.css') }}">
</head>
<body>
	{{-- <form class="box" method="POST" action="{{ route('login') }}">
		@csrf
        <h1>Login</h1>
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="Login">
    </form> --}}



    <section>
  
        <div class="box">
          
          <div class="square" style="--i:0;"></div>
          <div class="square" style="--i:1;"></div>
          <div class="square" style="--i:2;"></div>
          <div class="square" style="--i:3;"></div>
          <div class="square" style="--i:4;"></div>
          <div class="square" style="--i:5;"></div>
          
         <div class="container"> 
          <div class="form"> 
            <h2>Login to {{ $content->name }}</h2>
            <form   method="POST" action="{{ route('login.check') }}">
                @csrf
              <div class="inputBx">
                <input type="text" required="required" name="username">
                
                <img src="{{asset('img/user.png')}}" alt="user">
              </div>
              <div class="inputBx password">
                <input id="password-input" type="password" name="password" required="required">
                
                <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
                <img src="{{asset('img/lock.png')}}" alt="lock" >
              </div>
              <label class="remember"><input type="checkbox">
                Remember</label>
              <div class="inputBx">
                <input type="submit" value="Log in"> 
              </div>
            </form>
          </div>
        </div>
          
        </div>
      </section>
      <script src="{{ asset('admin/js/login.js') }}"></script>
</body>
</html>

