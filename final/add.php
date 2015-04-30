<?php

include 'head.php';
include 'nav.php';
require_once('variables.php');

$synopsis = trim($_POST[synopsis]);
$title = $_POST[title];
$rating = $_POST[rating];
$photo = $_POST[photo];


if(isset($_POST['submit'])){

// ---- make photo path and name ----
  $ext =  pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
  $filename = $title . time() . '.' . $ext;
  $filepath = 'images/';


// ---- validate image submision ---
$validImage = true;

//check for missingfile
   if ($_FILES['photo']['size'] == 0){
          echo 'No files submitted';
          $validImage = false;
   };
// ---- check image size ----
  if ($_FILES['photo']['size'] > 204800){
      echo 'File too big. Must be less than 200KB';
      $validImage = false;
  };
// ---- check file type ----
  if ($_FILES['photo']['type'] == 'image/gif' || $_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/pjpeg' || $_FILES['photo']['type'] == 'image/png'){
  }else{
    echo 'Wrong fileformat. Must be gif, jpeg or png.';
    $validImage = false;
  };

 if ($validImage == true){
    //upload file
    $temp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($temp_name, "$filepath$filename");
    @unlink($_FILES['photo']['tmp_name']);


        $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

        $query1 = "INSERT INTO final (title, rating, synopsis, photo)" . "VALUES('$title', '$rating', '$synopsis', '$filename')";
         $result1 = mysqli_query($dbconnect, $query1) or die('login query failed');


         header('Location: admin.php');

  }else{
    //try again
    echo '<a href="index.html">Please upload file again</a>';
  }
}//end ifset


?>
<div class="container">
<h1>Add a movie</h1>
 <form action="add.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm well">

      <div class="input-group">
        <span>Title</span><input type="text" name="title" value="" class="form-control inputs" required>
      </div>

      <div class="input-group">
       <span>Rating</span><br>
       <input type="radio" name="rating" value="G"><span>G</span><br>
       <input type="radio" name="rating" value="PG"><span>PG</span><br>
       <input type="radio" name="rating" value="PG-13"><span>PG-13</span><br>
       <input type="radio" name="rating" value="R"><span>R</span><br>
     </div>

    <div class="input-group">
        <span>Photo<input type="file" name="photo" class="form-control"></span>
    </div>

    <div class="input-group">
        <span>Movie Synopsis</span>
        <textarea name="synopsis" class="form-control" rows="8" cols="5"></textarea>
    </div>
     <button type="submit" class="btn submit" name="submit">Submit</button

     </div>
   </form>

</div>
</body>
</html>
