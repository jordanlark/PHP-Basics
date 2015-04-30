<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="style.css" >
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>Delete Stuff</title>
</head>

<body>

<form action="<?php $SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
<fieldset><legend>Select peeps for Array</legend>

<?php
//connect to db using - host, user, pw, db
$dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');


//  *** ** Delete Records *** **
if(isset($_POST['submit'])){
  foreach($_POST['todelete'] as $deleted_id){
    //echo $deleted_id;
    $query = "DELETE FROM newsletter WHERE id=$deleted_id";

    //call functions
    $result = mysqli_query($dbconnect, $query) or die('run query failed');

  };
};


//build query
$query = "SELECT * FROM newsletter";

//call functions
$result = mysqli_query($dbconnect, $query) or die('run query failed');


//  *** ** Display remaining Records *** **
while($row = mysqli_fetch_array($result)){
  echo '<span>';
  echo '<input type="checkbox" value="'.$row['id'].'" name="todelete[]">';
  echo $row['firstname'] .' '. $row['lastname'] .' - '. $row['email'] .'<br>';
  echo '</span>';
};

//close connection to database
mysqli_close($dbconnect);

 ?>

 <input type="submit" name="submit" value="Delete Selections" id="submit"/>

 </fieldset>
</form>
</body>
</html>
