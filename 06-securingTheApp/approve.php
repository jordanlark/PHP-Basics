<?php

require_once('auth.php');

require_once('variables.php');
// ---- connect to db using - host, user, pw, db ----
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
// ---- build query ----
$query = "SELECT * FROM suggestion WHERE approved=0 ORDER BY date ASC";
$result = mysqli_query($dbconnect, $query) or die('run query failed');
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="bootstrap.css" >
<link rel="stylesheet" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>Approve Suggestions</title>
</head>

<body>
<div class="container">
<h1>Approve Suggestions</h1>
<?php include 'nav.php'; ?>

<?php
if(mysqli_num_rows($result) == 0){
  echo '<p>There are no more suggestions to approve or delete.</p>';
}else{
while($row = mysqli_fetch_array($result)){
  echo '<article class="padding-sm clearfix panel panel-default">';
  echo '<a class="btn btn-success pull-right" href=approve2.php?id='.$row['id'].'>Approve</a>';
  echo '<a class="btn btn-danger pull-right delete" href=delete.php?id='.$row['id'].'>Delete</a>';
echo  '<p>';
echo $row['first'] . ' - ' . $row['date'];//date("F jS, Y - h:i", $row['date']);
echo  '</p>';
echo  '<p>';
echo  $row['comments'];
echo  '</p>';
  //echo $row['date'];
  echo  '</article>';
}
}

 ?>



</div>
</body>
</html>
