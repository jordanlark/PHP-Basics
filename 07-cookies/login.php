<?php
require_once('variables.php');

  $feedback = '<br><a href="signup.php">Create an account </a>' . ' or return <a href="index.php"> home</a>';

  if(isset($_POST['submit'])){

    $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
    $username = mysqli_real_escape_string($dbconnect, trim($_POST['username']));
    $pw = mysqli_real_escape_string($dbconnect, trim($_POST['pw']));

    $query = "SELECT * FROM cookies WHERE username = '$username' AND password = SHA('$pw')";
    $data = mysqli_query($dbconnect, $query) or die('login query failed');

  if(mysqli_num_rows($data) == 1){
    $feedback =  'you are now logged in';
    $row = mysqli_fetch_array($data);

    setcookie('username', $username, time() + (60*60*24*30));
    setcookie('first', $row['first'], time() + (60*60*24*30));
    setcookie('last', $row['last'], time() + (60*60*24*30));

    header('Location: index.php');

  }else{
    $feedback = 'No account found try again or create a new account. ' .  '<a href="signup.php"> sign up</a>';
  }// end if

};//end isset

include 'head.php';

?>

<body>
<div class="container">
  <?php echo $feedback; ?>
<form action="login.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">

  <div class="form-group">
    <span>Username <input type="text" name="username" value="" class="form-control" required></span>
  </div>

  <div class="form-group">
    <span>Password <input type="password" name="pw" value="" class="form-control" required></span>
  </div>

  <button type="submit" class="btn btn-default" name="submit">Log in</button

</div>
</form>
</div>
</body>
</html>
