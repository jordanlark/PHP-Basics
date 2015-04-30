
<?php
require_once('variables.php');
$first = $_POST[first];
$emphasis = $_POST[emphasis];
$comments = $_POST[comments];
//$datenow = date("F jS, Y - h:i");

    // ---- connect to db using - host, user, pw, db ----
    $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
    // ---- build query ----

      $query = "INSERT INTO suggestion (first, emphasis, comments)" . "VALUES ('$first', '$emphasis', '$comments')";
    // ---- call functions & close connection ----
    $result = mysqli_query($dbconnect, $query) or die('add comment query failed');
    mysqli_close($dbconnect);

 ?>

 <!doctype html>
 <html>
 <head>
 <meta charset="utf-8">

 <link rel="stylesheet" href="bootstrap.css" >
 <link rel="stylesheet" href="style.css">
 <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
 <title>Thanks</title>
 </head>
 <body>
 <div class="container">
   <?php include 'nav.php'; ?>
<p class="margin-sm padding-sm">Thank you! Your comments are pending administrative approval.</p>

 </div>
 </body>
 </html>
