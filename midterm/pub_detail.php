<?php
require_once('variable.php');
$id = $_GET['id'];
//connect to db using - host, user, pw, db
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

//  ****** Display Records ******
$query = "SELECT * FROM midterm WHERE id=$id";
$result = mysqli_query($dbconnect, $query) or die ('display query run failed');
$found = mysqli_fetch_array($result);

 ?>
<?php include 'head.php'; ?>

<body>
  <div class="container padding-sm">

  <h1 class="padding-sm">Research Group Employees</h1>

<?php include 'nav.php'; ?>

<?php

  echo '<h2>' . $found['name'] . '</h2>';
  echo '<p> <img class="pull-left" src="'. $found['picture'] .'" alt="employee" /> </p>';
  echo '<article>';
  echo '<p>' . $found['email'] . '</p>';
  echo '<p>' . $found['phone'] . '</p>';
  echo '<p>' . $found['address'] . '</p>';
  echo '<p>' . $found['paragraph'] . '</p>';
  echo '</article>';
  echo '<a class="padding-xsm" href="email.php?id='.$found['id'].'">Send an Email</a>';
?>

</div>
</body>
</html>
