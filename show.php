<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-image: url("register.jpg"); /* Replace 'path_to_your_image.jpg' with your image path */
      background-size: cover;
      background-position: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      color: #000000; /* Text color */
      text-align: center;
    }
    .success-message {
      font-size: 40px;
      margin-bottom: 20px;
    }
    .welcome-username {
      font-size: 46px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .login-link {
      color: #fff;
      text-decoration: none;
      font-size: 20px;
      margin-top: 10px;
    }
    .login-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <?php
  include 'connection.php';
  $uname = $_GET["name"];
  $eid = $_GET["email"];
  $pw1 = $_GET["pass1"];
  $pw2 = $_GET["pass2"];

  if ($pw1 === $pw2) {
    $query = "INSERT INTO login(name,email,password) VALUES ('$uname','$eid','$pw1')";
    $result = $connect->query($query);

    if ($result) {
      echo "<div class='success-message'>Registration successful</div>";
      echo "<div class='welcome-username'>Welcome $uname</div>";
      ?>
      <div class="login-link"><a href="login.html">Login</a></div>
      <?php
    } else {
      echo "Registration unsuccessful. Please try again later.";
      ?>
      <div class="login-link"><a href="reg1.html">Go back to registration</a></div>
      <?php
    }
  } else {
    echo "Password mismatch. Registration unsuccessful.";
    ?>
    <div class="login-link"><a href="reg1.html">Go back to registration</a></div>
    <?php
  }
  ?>
</body>
</html>
