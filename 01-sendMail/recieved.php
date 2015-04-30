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
