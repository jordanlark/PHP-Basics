<?php
 //connect to db using - host, user, pw, db
 $dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');

  //build query
  $query = "SELECT * FROM babycontest ORDER BY last ASC";// WHERE id=$id"

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

<h1>View All Contestants</h1>

<?php

//  ****** Display  Records ******
 while($row = mysqli_fetch_array($result)){
   echo '<p>';echo '<p>';
   echo $row['first'] .' '. $row['last'] . '<br>' . $row['gender'] .' - '. $row['tel'] .'<br>';
   echo '<a href="update.php?id='.$row['id'].'">Update</a>' . ' - ' . '<a href="detail.php?id='.$row['id'].'">View</a>';
   echo '</p>';
   echo '</p>';
 };

//close connection to database
//mysqli_close($dbconnect);

?>

<?php include 'nav.php'; ?>

</div>
</body>
</html>
