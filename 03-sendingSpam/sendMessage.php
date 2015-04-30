<?php
$subject = $_POST[subject];
$message = $_POST[message];
$email = $_POST[email];
$from = "jordanlarkin24@gmail.com";

//connect to db using - host, user, pw, db
$dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');

//build query
$query = "SELECT * FROM newsletter";

//call functions
$result = mysqli_query($dbconnect, $query) or die('run query failed');

//display selection
while($row = mysqli_fetch_array($result)){
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $to = $row['email'];
  $newMessage = "Hello, $firstname $lastname! \n $message";

  mail($to, $subject, $newMessage, 'From:' . $from);

  echo'A message was sent to '.$to . '<br>';
};


//close connection to database
mysqli_close($dbconnect);

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

</body>
</html>
