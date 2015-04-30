<?php

require_once('variable.php');

$name = $_POST['name'];
$expertise = $_POST['expertise'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$specialization = $_POST['specialization'];
//$picture = $_POST['picture'];
$id = $_POST['id'];

    // ---- connect to db using - host, user, pw, db ----
    $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

    // ---- build query ----
    $query = "UPDATE midterm SET name='$name', expertise='$expertise', phone='$phone', email='$email',  address='$address', specialization='$specialization' WHERE id=$id";

     // ---- call functions & close connection ----
     $result = mysqli_query($dbconnect, $query) or die('update db query failed');

    //close DB
    mysqli_close($dbconnect);

  header('Location: manage.php');


 ?>
