<?php
$id = $_GET['id'];

require_once('auth.php');
require_once('variable.php');
// ---- connect to db using - host, user, pw, db ----
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
// ---- build query ----
$query = "DELETE FROM midterm WHERE id=$id";
//send it up to db
$result = mysqli_query($dbconnect, $query) or die('delete query failed');

//return to approve page
header('Location: manage.php');

 ?>
