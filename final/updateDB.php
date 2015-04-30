<?php

require_once('variables.php');

$id = $_POST['id'];
$title = $_POST['title'];
$rating = $_POST['rating'];
$synopsis = trim($_POST['synopsis']);

// ---- connect to db using - host, user, pw, db ----
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "UPDATE final SET title='$title', rating='$rating', synopsis='$synopsis' WHERE id=$id";

$result = mysqli_query($dbconnect, $query) or die('run query failed');

mysqli_close($dbconnect);

header('Location: index.php');

 ?>
