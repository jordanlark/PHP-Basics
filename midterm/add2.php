<?php
 require_once('variable.php');

 include 'head.php';
 echo '<body>';
 echo '<div class="container padding-sm">';
 include 'nav.php';

 $name = $_POST[name];
 $expertise = $_POST[expertise];
 $phone = $_POST[phone];
 $email = $_POST[email];
 $address = $_POST[address];
 $specialization = $_POST[specialization];
 $picture = $_POST[picture];

 // ---- make picture path and name ----
    $ext =  pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
    $filename = $name . time() . '.' . $ext;
    $filepath = 'images/';
    $picturename = $filepath . $filename;

// ---- validate image submision ---
$validImage = true;

 //check for missingfile
   if ($_FILES['picture']['size'] == 0){
          echo  'No files submitted ';
          $validImage = false;
   };

  if($_FILES['picture']['size'] > 204800){
      echo 'File too big. Must be less than 200KB ';
      $validImage = false;
  };

  if ($_FILES['picture']['type'] == 'image/gif' || $_FILES['picture']['type'] == 'image/jpeg' || $_FILES['picture']['type'] == 'image/pjpeg' || $_FILES['picture']['type'] == 'image/png'){
  }else{
    echo 'Wrong fileformat. Must be gif, jpeg or png. ';
    $validImage = false;
  };

 if ($validImage == true){
      //upload file
      $tmp_name = $_FILES['picture']['tmp_name'];
      move_uploaded_file($tmp_name, "$filepath$filename");
      @unlink($_FILES['picture']['tmp_name']);

      // ---- connect to db using - host, user, pw, db ----
      $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
      // ---- build query ----
      $query = "INSERT INTO midterm (name, phone, expertise, email, address, specialization, picture)" .
      "VALUES ('$name', '$phone', '$expertise', '$email', '$address', '$specialization', '$picturename')";
      // ---- call functions & close connection ----
      $result = mysqli_query($dbconnect, $query) or die('run query failed');

      mysqli_close($dbconnect);
  echo "<h1>Employee has been added</h1>";
  }else{
     echo '<a href="add.php"> Please upload file again</a>';
  };

//header('Location: manage.php');
?>
<img src="<?php echo $filepath . $filename; ?> " alt="" />

</div>
</body>
</html>
