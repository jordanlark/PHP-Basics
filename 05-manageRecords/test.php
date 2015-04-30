<?php
 // $first = $_GET[first];
 // $last = $_GET[last];
 // $gender = $_GET[gender];
 // $tel = $_GET[tel];
 // $photo = $_GET[photo];
 // $id =$_GET[id];

 $baby_id = $_POST[id];
 //connect to db using - host, user, pw, db
 $dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');

  //build query
  $query = "SELECT FROM babycontest WHERE id=$_POST[id]";


  //call functions
  $result = mysqli_query($dbconnect, $query) or die('run query failed');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="bootstrap.css" >
<link rel="stylesheet" href="style.css" >
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>Manage Stuff</title>
</head>

<body>
<div class="container">

<h1>All Contestants</h1>

<?php

//  ****** Display  Records ******
//  while($row = mysqli_fetch_array($result)){
 //   echo '<p>';
 //   echo $first .' '. $last . '<br>. '$gender' . ' . ' - '. $tel;
 //   echo '<img src="' . $photo . '" alt="baby" />';
 //   echo '</p>';
// };

//close connection to database
//mysqli_close($dbconnect);

?>

<?php include 'nav.php'; ?>

</div>
</body>
</html>
