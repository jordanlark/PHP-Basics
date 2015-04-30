<?php
 require_once('variable.php');

 echo '<div class="container padding-sm">';


 $id = $_GET['id'];
 //connect to db using - host, user, pw, db
 $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
 //build query
 $query = "SELECT * FROM midterm WHERE id=$id";
 //call functions
 $result = mysqli_query($dbconnect, $query) or die('email query failed');
 $found = mysqli_fetch_array($result);
 include 'head.php';
?>

<h1 class="padding-sm margin-left">Send an Email</h1>

  <?php include 'nav.php'; ?>

  <form action="sendEmail.php" method="POST" enctype="multipart/form-data">

  <fieldset>

<div class="input-group ">
  <label>Subject</label><input name="subject" type="text" value="" required/>
</div>
<div class="input-group">
  <label>Message</label><textarea name="message" rows="8" cols="40" required></textarea>
      <input type="hidden" name="id" value="<?php echo $found['id']; ?>">
</div>
  </fieldset>

  <input class="btn bg-green margin-sm margin-left" type="submit" value="Send" id="submit"/>

  </form>

</div>
</body>
</html>
