<?php

require_once('variables.php');

$id = $_GET['id'];

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM final WHERE id='$id'";

$result = mysqli_query($dbconnect, $query) or die('display query failed');

$found = mysqli_fetch_array($result);


include 'head.php';
include 'nav.php';
?>
<div class="container">

<h1>Modify</h1>

 <form action="updateDB.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm well">

     <?php
     echo '<span>Title</span><input type="text" name="title" value="'.$found['title'].'" class="form-control inputs input-group" required>';
     ?>

     <p>Current rating is: <?php
     echo $found['rating'];
      ?> </p>

     <div class="input-group ">
       <span>Rating</span><br>
       <input type="radio" name="rating" value="G"><span>G</span><br>
       <input type="radio" name="rating" value="PG"><span>PG</span><br>
       <input type="radio" name="rating" value="PG-13"><span>PG-13</span><br>
       <input type="radio" name="rating" value="R"><span>R</span><br>
    </div>

    <div class="input-group">
      <br><br>
      <span>Movie Synopsis</span>
       <textarea name="synopsis" class=" input-group form-control"  value=""><?php echo $found['synopsis']; ?></textarea>
    </div>

    <input type="hidden" name="id" value=" <?php echo $found['id'] ?> ">

      <input type="submit" name="submit" class="btn submit" value="Update" id="submit"/>
     </div>
   </form>

</div>
</body>
</html>
