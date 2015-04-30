<?php
require_once('variables.php');
  $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

if (isset($_POST['submit'])){

  $first = mysqli_real_escape_string($dbconnect, trim($_POST['first']));
  $last = mysqli_real_escape_string($dbconnect, trim($_POST['last']));
  $username = mysqli_real_escape_string($dbconnect, trim($_POST['username']));
  $pw1 = mysqli_real_escape_string($dbconnect, trim($_POST['pw1']));
  $pw2 = mysqli_real_escape_string($dbconnect, trim($_POST['pw2']));

  if(!empty($username) && !empty($pw1) && !empty($pw2) && ($pw1 == $pw2)) {
      //check for duplicate usernames
      $query = "SELECT * FROM cookies WHERE username = '$username'";
      $duplicate = mysqli_query($dbconnect, $query) or die('duplicate query failed');
      if(mysqli_num_rows($duplicate) == 0){
        $query = "INSERT INTO cookies (first, last, username, password, date) VALUES ('$first', '$last', '$username', SHA('$pw1'), NOW() )";
        mysqli_query($dbconnect, $query) or die('insert new user query failed');

        $feedback = 'You are now signed up! ' . ' Return to the <a href="index.php">homepage</a>';

        setcookie('username', $username, time() + (60*60*24*30)); // expires in 30 days
        setcookie('first', $first, time() + (60*60*24*30));
        setcookie('last', $last, time() + (60*60*24*30));

        mysqli_close($dbconnect);

      //  exit();

      }else{
        $feedback =  'Username already exists. Please try again.';
      }

  }// end isset
}//end if
include 'head.php';
?>

<body>
  <div class="container">
  <?php echo $feedback; ?>
  <form action="signup.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">
    <div class="form-group ">
      <span>First Name<input type="text" name="first" value="<?php if(!empty($first)) echo $first ?>" class="form-control" required></span>
    </div>

      <div class="form-group">
        <span>Last Name <input type="text" name="last" value="<?php if(!empty($last)) echo $last ?>" class="form-control" required ></span>
      </div>

    <div class="form-group">
      <span>Username <input type="text" name="username" value="<?php if(!empty($username)) echo $username ?>" class="form-control" required></span>
    </div>

    <div class="form-group">
      <span>Password <input type="password" name="pw1" value="" class="form-control" required></span>
    </div>

    <div class="form-group">
      <span>Retype Password <input type="password" name="pw2" value="" class="form-control" required></span>
    </div>

  <button type="submit" class="btn btn-default" name="submit">Sign up!</button

  </div>
  </form>
</div>
</body>
</html>
