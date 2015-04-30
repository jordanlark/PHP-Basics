<?php
$firstname = $_POST[firstname];
$email = $_POST[email];
$soda = $_POST[soda];
$diet = $_POST[diet];
$bottle = $_POST[bottle];
$amount = $_POST[amount];

//Write Email
$to = 'jordanlarkin24@gmail.com';
$subject = 'Soda Order';
$message = "Thank you $firstname for your order of $amount $bottle of $diet $soda!";

mail($to, $subject, $message, 'FROM:' . $email);

//connect to db using - host, user, pw, db
$dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');

//build query
$query = " INSERT INTO sodaform (firstname, email, soda, diet, bottle, amount)" .
"VALUES ('$firstname', '$email', '$soda', '$diet', '$bottle', '$amount')";

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

<title>Send</title>
</head>

<body>

<?php  echo $message; ?>
</body>
</html>
