<?php

require_once('auth.php');

require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
$query = "SELECT * FROM final";
$result = mysqli_query($dbconnect, $query) or die('login query failed');

  // function showModify($idnum){
  //   if(isset($_COOKIE['username'])){
  //     echo '<a class="btn submit" href=modify.php?id='.$idnum.'><i class="fa fa-wrench"></i> Modify</a>';
  //   }
  // }

 ?>
<?php
include 'head.php';
include 'nav.php'; ?>
<div class="container">

  <h1>Movies and such</h1>

  <div class="col-md-12">
    <a href="add.php" class="btn add-btn pull-left"> <i class="fa fa-plus"></i> Add Movie</a>
  </div>

  <?php

  while ($row = mysqli_fetch_array($result)){


  echo '<article class="pull-left article-thing col-md-6">';
  echo '<img class="pull-left" src="images/' . $row['photo'] .'" alt="movie poster" />';
  echo  '<h2>'.$row['title'].'</h2>';
  echo '<p><strong> Rating: </strong>'. $row['rating'] .'</p>';
  echo '<a class="btn submit" href=modify.php?id='.$row['id'].'><i class="fa fa-wrench"></i> Modify</a>';

// showModify($idnumber);

  echo '</article>';



  }

  mysqli_close($dbconnect);
   ?>




 </body>
</html>
