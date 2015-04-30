<?php
$first = $_POST['first'];
$last = $_POST['last'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$specialty = $_POST['specialty'];
//$skills = $_POST['skills'];

echo $first . ' ';

echo $_POST['resultSkills'];

require_once('variables.php');
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
$query = "INSERT INTO chef (first, last, gender, email, specialty_id) VALUES ('$first', '$last', '$gender', '$email', '$specialty')";
$result = mysqli_query($dbconnect, $query) or die('add to db query failed');

/* update skills table */

$recent_id = mysqli_insert_id($dbconnect);

//loop through array that holds selected packages
foreach($_POST['skills'] as $skillSet_id){
  $query = "INSERT INTO chef_skillSet (chef_id, skill_id) VALUES ('$recent_id', '$skillSet_id')";
  $result = mysqli_query($dbconnect, $query) or die('login query failed');
  echo $recent_id . $skillSet_id;
};

mysqli_close($dbconnect);

header('Location: index.php');

?>
