<?php
$first = $_POST[first];
$last = $_POST[last];
$gender = $_POST[gender];
$tel = $_POST[tel];
$id = $_POST[id];


    // ---- connect to db using - host, user, pw, db ----
$dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');
    // ---- build query ----
$query = "UPDATE babycontest SET first='$first', last='$last', tel='$tel', gender='$gender' WHERE id=$id";
    // ---- call functions & close connection ----
$result = mysqli_query($dbconnect, $query) or die('run query failed');
   //close DB
mysqli_close($dbconnect);


 ?>

<!doctype html>
<html>
<meta charset="utf-8" http-equiv="Content-Type" content="text/html">

<link rel="stylesheet" href="style.css" >
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>Baby Contest</title>
</head>

<body>
<div class="container">
  <h1>Your update has been completed</h1>

<?php include 'nav.php'; ?>

</div>


</body>
</html>
