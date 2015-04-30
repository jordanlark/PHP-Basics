<?php

require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
$query = "SELECT * FROM final ORDER BY title";
$result = mysqli_query($dbconnect, $query) or die('login query failed');

 ?>
<?php
include 'head.php';
include 'nav.php'; ?>
<div class="container">

  <h1>Movies and such</h1>

  <?php

  while ($row = mysqli_fetch_array($result)){

  echo '<article class="pull-left article-thing col-md-6">';
  // $idnumber = $row['id'];
  echo '<img class="pull-left" src="images/' . $row['photo'] .'" alt="movie poster" />';
  echo  '<h2>'.$row['title'].'</h2>';
  echo '<p><strong> Rating: </strong>'. $row['rating'] .'</p>';
  echo '<a class="btn submit" href=details.php?id='.$row['id'].'><i class="fa fa-arrow-right"></i> See more  </a><br>';
  echo '</article>';
  }

  mysqli_close($dbconnect);
   ?>




 </body>
</html>
