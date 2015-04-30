<?php
$baby_id = $_GET[id];

//connect to db using - host, user, pw, db
$dbconnect = mysqli_connect('localhost', 'jordanl6_main', ',a-J#{[6g-fQ', 'jordanl6_dgm3760') or die('connection failed');

//build query
$query = "SELECT * FROM babycontest WHERE id='$baby_id'";

//call functions
$result = mysqli_query($dbconnect, $query) or die('run  select query failed');

//put data in an array
$found = mysqli_fetch_array($result);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="bootstrap.css" >
<link rel="stylesheet" href="style.css" >
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>Update Stuff</title>
</head>

<body>
<div class="container">


  <form action="updateDatabase.php" method="POST" enctype="multipart/form-data">

  <h1>Update Contestant</h1>
<div class="form-group">
      <label>First Name <input type="text" name="first" value="<?php echo $found['first'] ?>" class="form-control"></label>
</div>
<div class="form-group">
      <label>Last Name <input type="text" name="last" value="<?php echo $found['last'] ?>" class="form-control"></label>
</div>
      <label> Current gender: <?php echo $found['gender'] ?> </label>
      <div class="radio">
        <label><input type="radio" name="gender" value="male" class="radio">Male </label>
      </div>
      <div class="radio">
        <label><input type="radio" name="gender" value="female" class="radio">Female</label>
      </div>
<div class="form-group">
      <label>Phone Number <input type="tel" name="tel" value="<?php echo $found['tel'] ?>"  class="form-control"></label>
</div>
   <input type="hidden" name="id" value=" <?php echo $found['id'] ?> ">
   <input type="submit" name="submit" value="Update" id="submit"/>

   </fieldset>
  </form>

<?php include 'nav.php'; ?>

</div>
</body>
</html>
