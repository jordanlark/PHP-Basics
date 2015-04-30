<?php
 include 'head.php';
 include 'nav.php';
?>

 <div class="container">

<h1>Find a movie</h1>

  <form action="search.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">

  <div class="well clearfix">
    <div class="form-group">
      <span class=""><input type="text" name="searchterm" value="" placeholder="Search . . ." class="form-control inputs" required></span>
    </div>

      <button type="submit" class="btn submit pull-left" name="submit">Search</button>
  </div>

<?php
 $query = "SELECT * FROM final";

   if(isset($_POST['submit'])){

     $final = strtolower($_POST[searchterm]);
     $finalCleanUp = str_replace(',',' ',$final);
     $searchTerms = explode(' ',$finalCleanUp);

     foreach($searchTerms as $temp){

         if(!empty($temp)){
           $searchArray[] = $temp;
         }
       }
       $whereList = array();
         foreach($searchArray as $temp){
           $whereList[] = "final LIKE '%$temp%' ";
         }
         $whereClause = implode(' OR ',$whereList);

        //  $query = "SELECT * FROM final";
         if(!empty($whereClause)){
           $query .= " WHERE $whereClause";
         }//end if

echo $query;

echo "<h2>Search Results</h2>";

 require_once('variables.php');
 $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

 $result = mysqli_query($dbconnect, $query) or die('search query failed');

 if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_array($result)){
     echo '<div class="col-md-12">';
      echo '<a href=details.php?id='.$row['id'].'><img class="thumbnail-img pull-left" src="images/'.$row[photo].'" alt="movie poster" /></a>';
      echo '<a href=details.php?id='.$row['id'].'><h3>'.$row[title].'</h3></a>';
      echo '<a href=details.php?id='.$row['id'].'><p class="search">Rating: '.$row[rating].'</p></a>';
      echo '<a href=details.php?id='.$row['id'].'><p class="search">'.$row[synopsis].'</p></a>';
      echo '</div>';
   }//end while loop
 }//end if

   }//end ifset


?>


      </div>
    </form>

</div>
</body>
</html>
