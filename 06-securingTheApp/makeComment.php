<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="bootstrap.css" >
<link rel="stylesheet" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<title>Make a Comment</title>
</head>

<body>
<div class="container">

<h1>Make a Suggestion</h1>
<?php include 'nav.php'; ?>

  <form action="add.php" method="POST" enctype="multipart/form-data">
<br><br><br>
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name="first" placeholder="Alice" required>
  </div>
  <div class="form-group">
    <label>Emphasis</label>
    <select class="form-control" name="emphasis">
      <option>Web</option>
      <option>Audio</option>
      <option>Cinema</option>
      <option>Animation</option>
    </select>
  </div>

  <textarea class="form-control" rows="3" name="comments" required>Comments</textarea>

  <button type="submit" class="btn btn-default btn-warning margin-sm">Submit</button>
</form>


</div>
</body>
</html>
