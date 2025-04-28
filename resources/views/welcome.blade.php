<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome - InvenTrack</title>
  <!-- <link rel="stylesheet" href="css/style.css" /> -->
  <style>
 /* Body with background image */
body {
  margin: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: url("{{ asset('ims background.jpg') }}") no-repeat center center fixed;
  background-size: cover;
  height: 100vh;
}

/* Dark overlay */
.overlay {
  background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black */
  height: 100%;
  width: 100%;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  flex-direction: column;
}

/* Content wrapper */
.welcome-wrapper {
  max-width: 800px;
  padding: 40px;
}

/* Text styles with shadow for readability */
.welcome-wrapper h1 {
  font-size: 3rem;
  margin-bottom: 20px;
  color: #ffffff;
  text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.8);
}

.welcome-wrapper p {
  font-size: 1.2rem;
  margin-bottom: 40px;
  color: #f1f1f1;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
}

/* Buttons */
.btn-primary, .btn-secondary {
  text-decoration: none;
  padding: 12px 30px;
  margin: 10px;
  border-radius: 6px;
  font-weight: bold;
  transition: 0.3s ease;
  font-size: 1rem;
  display: inline-block;
}

.btn-primary {
  background-color: white;
  color: #007bff;
}

.btn-primary:hover {
  background-color: #f1f1f1;
}

.btn-secondary {
  background-color: transparent;
  color: white;
  border: 2px solid white;
}

.btn-secondary:hover {
  background-color: white;
  color: #007bff;
}

/* Responsive adjustments */
@media (max-width: 600px) {
  .welcome-wrapper h1 {
    font-size: 2rem;
  }

  .btn-primary, .btn-secondary {
    width: 80%;
    margin: 8px auto;
  }
}

  </style>
</head>
<body>
  <div class="overlay">
  <div class="welcome-wrapper">
    <h1>Welcome to InvenTrack</h1>
    <p>Efficient. Organized. Reliable.<br>Track and manage your stock with ease.</p>

    <a href="{{route('login')}}" class="btn-primary">Login</a>
    <a href="{{route('signup')}}" class="btn-secondary">Sign Up</a>
  </div>
</div>
</body>
</html>

