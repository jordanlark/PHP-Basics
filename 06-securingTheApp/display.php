<?php

require_once('variables.php');
// ---- connect to db using - host, user, pw, db ----
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
// ---- build query ----
$query = "SELECT * FROM suggestion WHERE approved=1 ORDER BY 'datenow'";
$result = mysqli_query($dbconnect, $query) or die('run query failed');

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="bootstrap.css" >
<link rel="stylesheet" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>DGM Suggestion Box</title>
</head>

<body>
<div class="container ">
<h1>DGM Suggestion Box</h1>
<?php include 'nav.php'; ?>
<?php
//echo date("F jS, Y - h:i");
while($row = mysqli_fetch_array($result)){
  echo '<article class="padding-sm clearfix panel panel-default">';
  echo  '<p>';
  echo $row['first'] . ' - ' . $row['date'];
  echo  '</p>';
  echo  '<p>';
  echo  $row['emphasis'];
  echo  '</p>';
  echo $row['comments'];
  //echo $row['date'];
  echo  '</article>';
}
?>
</div>
</body>
</html>
