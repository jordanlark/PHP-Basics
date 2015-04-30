<?php
  $first = $_POST[first];
  $last = $_POST[last];
  $gender = $_POST[gender];
  $tel = $_POST[tel];
  $photo = $_POST[photo];

// ---- make photo path and name ----
  $ext =  pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
  $filename = $first . $last . time() . '.' . $ext;
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

    // ---- connect to db using - host, user, pw, db ----
    $dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');
    // ---- build query ----
    $query = "INSERT INTO babycontest (first, last, tel, gender, photo)" .
  "VALUES ('$first', '$last', '$tel', '$gender', '$filename')";
    // ---- call functions & close connection ----
    $result = mysqli_query($dbconnect, $query) or die('run query failed');

    mysqli_close($dbconnect);
  echo "<h1>Your picture has been submitted</h1>";

  }else{
    //try again
    echo '<a href="index.html">Please upload file again</a>';
  };

 ?>

<!doctype html>
<html>
<meta charset="utf-8" http-equiv="Content-Type" content="text/html">

<link rel="stylesheet" href="style.css" >
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>Baby Contest</title>
</head>

<body>

<div class="container">


<?php  echo '<img src="'.$filepath . $filename.'" alt="baby" />'; ?>
<?php include 'nav.php'; ?>

</div>
</body>
</html>
