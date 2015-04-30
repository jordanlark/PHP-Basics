
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="bootstrap.css" >
<link rel="stylesheet" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>Delete Stuff</title>
</head>

<body>
<div class="container">

 <h1>Enter "Most Adorable Baby" Contest!</h1>

  <form action="add2.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group">
      <span>First Name <input type="text" name="first" value="" class="form-control"></span>
    </div>

    <div class="form-group">
      <span>Last Name <input type="text" name="last" value="" class="form-control"></span>
    </div>
      <label>Gender</label>

      <div class="radio">
        <label><input type="radio" name="gender" value="male" class="radio">Male </label>
      </div>
      <div class="radio">
        <label><input type="radio" name="gender" value="female" class="radio">Female</label>
      </div>

    <div class="form-group">
      <span>Phone Number <input type="tel" name="tel" value="" placeholder="801-555-1245" class="form-control"></span>
    </div>

    <div class="form-group">
      <span>Photo<input type="file" name="photo" class="form-control"></span>
    </div>

<button type="submit" class="btn btn-default" name="submit">Enter Contest!</button

 </div>
  </form>


<?php include 'nav.php'; ?>
</div>
</body>
</html>
