<?php
require_once('variables.php');
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM chef_specialty ORDER BY value";
$result = mysqli_query($dbconnect, $query) or die('login query failed');

include 'head.php';
 ?>
  <body>
   <?php include 'nav.php'; ?>
    <div class="container">

      <h2>Search for a Chef based on their Specialty</h2>

      <ul>
        <?php
          while($row = mysqli_fetch_array($result)){
            echo '<li><a href="index.php?specialty_id='.$row['spec_id'].'">'.$row['value'].'</a></li>';
          }
         ?>
      </ul>

    </div>
  </body>
</html>
