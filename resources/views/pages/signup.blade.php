<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up - InvenTrack</title>
  <link rel="stylesheet" href="<?php echo asset('css/style2.css')?>" />
</head>
<body>

  <div class="login-container">
    <h2>Create Your Account</h2>
    <form method="POST" action="{{ route('insertuser') }}">
        @csrf
      <input type="text" name="name" id="name" placeholder="Full Name" required />
      <input type="email" id="email" name="email" placeholder="Email Address" required />
      <input type="text" name="username" id="username" placeholder="Username" required />
      <input type="password" id="password" name="password" placeholder="Password" required />
      <!-- <input type="password" placeholder="Confirm Password" required /> -->
      <button type="submit">Sign Up</button>

      <p style="margin-top: 10px;">Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </form>
  </div>


  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>
