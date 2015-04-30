<?php
$baby_id = $_GET[id];

//connect to db using - host, user, pw, db
$dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');

//  ****** Display Records ******
$query = "SELECT * FROM babycontest WHERE id=$baby_id";
$result = mysqli_query($dbconnect, $query) or die ('display query run failed');
$found = mysqli_fetch_array($result);

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="bootstrap.css" >
<link rel="stylesheet" href="style.css" >
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>View Stuff</title>
</head>

<body>

<div class="container">


<?php
echo '<h1>' . $found['first'] . ' ' . $found['last'] .'</h1>';
echo '<img src="images/' . $found['photo'] .'" alt="baby" />';
echo  '<p>'. $found['gender'] . ' - ' . $found['tel'] . '</p>';
?>


</form>
<div class="keepOpen"></div>


<?php include 'nav.php'; ?>

</div>
</body>
</html>
