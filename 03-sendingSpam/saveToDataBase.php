<?php
$firstname = $_POST[firstname];
$lastname = $_POST[lastname];
$email = $_POST[email];


//connect to db using - host, user, pw, db
$dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');

//build query
$query = " INSERT INTO newsletter (firstname, lastname, email)" .
"VALUES ('$firstname', '$lastname', '$email')";

//call functions
$result = mysqli_query($dbconnect, $query) or die('run query failed');

//close connection to database
mysqli_close();



?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="styles.css" >
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>Send</title>
</head>

<body>

<p>
  Thank you for subscribing to our Newsletter!
</p>
</body>
</html>
