<?php
$baby_id = $_GET[id];

//connect to db using - host, user, pw, db
$dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');

//  ****** Delete Records ******
if(isset($_POST['submit'])){

  $query = "DELETE FROM babycontest WHERE id=$_POST[id]";
  $result = mysqli_query($dbconnect, $query) or die ('delete query failed');

  @unlink($_POST['photo']);

  header("Location: http://dgm3760.jordanlarkindesign.com/05-manageRecords/delete.php");


  exit;
};


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
<title>Delete Stuff</title>
</head>

<body>

<div class="container">

<h1>Delete Contestant</h1>
<form action="delete2.php" method="POST">

<?php
echo '<h2>' . $found['first'] . $found['last'] .'</h2>';
echo  '<p>'. $found['gender'] . '<br>' . $found['phone'] . '</p>';
?>

<input type="hidden" name="photo" value="images/<?php echo $found['photo'] ?>">
<input type="hidden" name="id" value="<?php echo $found['id'] ?>">
<input type="submit" name="submit" value="Delete Contestant"> <a href="delete.php">Cancel</a>

</form>
<div class="keepOpen"></div>


<?php include 'nav.php'; ?>

</div>
</body>
</html>
