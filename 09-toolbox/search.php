<?php
 include 'head.php';
 include 'nav.php';
?>

 <div class="container">

  <form action="search.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm well">
    <div class="form-group ">

      <span class=""><input type="text" name="flavor" value="" placeholder="Fudge Ripple . . ." class="form-control inputs" required></span>
    </div>
      <button type="submit" class="btn btn-default submit-btn" name="submit">Search</button>

<?php
$query = "SELECT * FROM flavor";

  if(isset($_POST['submit'])){

    $flavor = strtolower($_POST[flavor]);
    $flavorCleanUp = str_replace(',',' ',$flavor);
    $searchTerms = explode(' ', $flavorCleanUp);

    foreach($searchTerms as $i){

        if(!empty($i)){
          $searchArray[] = $i;
        }
      }
      $whereList = array();
        foreach($searchArray as $temp){
          $whereList[] = "flavor LIKE '%$temp%' ";
        }
        $whereClause = implode(' OR ', $whereList);

        $query = "SELECT * FROM flavor";
        if(!empty($whereClause)){
          $query .= " WHERE $whereClause";
        }


require_once('variables.php');
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$result = mysqli_query($dbconnect, $query) or die('serach query failed');

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){
    echo '<h3>'.$row[name].'</h3>';
    echo $row[flavor];
  }
}

  }


?>


      </div>
    </form>

</div>
</body>
</html>
