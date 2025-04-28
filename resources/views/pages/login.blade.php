<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Inventory System</title>
  <link rel="stylesheet" href="<?php echo asset('css/style2.css')?>" type="text/css" />
</head>
<body>

  <div class="login-container">
    <h2>Login to Inventory System</h2>
    <form action="{{ route('validateuser') }}" method="POST">
      @csrf
      <input type="text" placeholder="Username or Email" name="username" required />
      <input type="password" placeholder="Password" name="password" required />
      <button type="submit">Login</button>
      <p style="margin-top: 10px;"><a href="#">Forgot Password?</a></p>
      <p style="margin-top: 10px;">Don't have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
    </form>
  </div>
  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $msg)
        <li>{{ $msg }}</li>
      @endforeach
    </ul>
  </div>
@endif

</body>
</html>
