<?php

require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM flavor";
// (name, birthday, flavor) VALUES('$name', '$birthday', '$flavor')";
 $result = mysqli_query($dbconnect, $query) or die('login query failed');

// function (like convert month)
  function convertMonth($monthnum){
    switch($monthnum){
      case 01:
        $month = "January";
        break;
      case 02:
        $month = "February";
        break;
      case 03:
        $month = "March";
        break;
      case 04:
        $month = "April";
        break;
      case 05:
        $month = "May";
        break;
      case 06:
        $month = "June";
        break;
      case 07:
        $month = "July";
        break;
      case 08:
        $month = "August";
        break;
      case 09:
        $month = "September";
        break;
      case 10:
        $month = "October";
        break;
      case 11:
        $month = "November";
        break;
      case 12:
        $month = "December";
        break;
    }
    return $month;
  }

 ?>
<?php
include 'head.php';
include 'nav.php'; ?>
<div class="container">

  <?php

  while ($row = mysqli_fetch_array($result)){

  $bday = explode("_", $row['birthday']);

  echo '<h2>' . $row['name'] . ' - ' . '<span class="small">' . convertMonth($bday[1]). " " .  $bday[0] . ", " . $bday[2] . '</span>' . '</h2>';
  echo '<p>'. $row['flavor'] .'</p>';
  // need substr($string, start, length)

  }

  mysqli_close($dbconnect);
   ?>
 </body>
</html>
