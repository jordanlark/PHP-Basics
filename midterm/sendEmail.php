<?php
require_once('variable.php');

$subject = $_POST['subject'];
$message = $_POST['message'];
$id = $_POST['id'];
$from = "jordanlarkin24@gmail.com";

//connect to db using - host, user, pw, db
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
//build query
$query = "SELECT * FROM midterm WHERE id=$id";

//call functions
$result = mysqli_query($dbconnect, $query) or die('send message query failed');

  while($row = mysqli_fetch_array($result)){
    $name = $row['name'];
    $to = $row['email'];
    $newMessage = "Hello, $name! \n $message";

    mail($to, $subject, $newMessage, 'From:' . $from);

  };
//close connection to database
mysqli_close($dbconnect);

?>
<?php include 'head.php';  ?>
<body>
  <div class="container padding-sm">

  <?php
  include 'nav.php';
  echo '<p> A message was sent to </p>'. $to;

   ?>
</body>
