<?php

require_once('variable.php');

$id = $_GET['id'];

//connect to db using - host, user, pw, db
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

//build query
$query = "SELECT * FROM midterm WHERE id='$id'";

//call functions
$result = mysqli_query($dbconnect, $query) or die('update query failed');

//put data in an array
$found = mysqli_fetch_array($result);

?>
<?php include 'head.php'; ?>
<body>
<div class="container padding-sm">

<h1 class="padding-sm">Research Group Employees</h1>

<?php include 'nav.php'; ?>


 <h2 class="padding-sm">Update Employee</h2>

  <form action="updateDatabase.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">
    <div class="form-group green">
      <span>Full Name <input type="text" name="name" value="<?php echo $found['name'] ?>" class="form-control "></span>
    </div>

      <div class="form-group green">
        <span>Expertise <input type="text" name="expertise" value="<?php echo $found['expertise'] ?>" class="form-control"></span>
      </div>


    <div class="form-group green">
      <span>Phone Number <input type="tel" name="phone" value="<?php echo $found['phone'] ?>" placeholder="8015551245" class="form-control"></span>
    </div>

    <div class="form-group green">
      <span>Email <input type="text" name="email" value="<?php echo $found['email'] ?>" placeholder="yo@work.com" class="form-control"></span>
    </div>

    <div class="form-group green">
      <span>Address <input type="text" name="address" value="<?php echo $found['address'] ?>" placeholder="123 maple" class="form-control"></span>
    </div>

    <div class="form-group green">
      <span>Specialization <input type="textarea" name="specialization" value="<?php echo $found['specialization'] ?>" placeholder="Human Resources" class="form-control"></span>
    </div>

  <!--  <div class="form-group green">
      <span>Photo<input type="file" name="picture" value="<?php echo $found['picture'] ?>" class="form-control"></span>
    </div> -->

    <input type="hidden" name="id" value=" <?php echo $found['id'] ?> ">

    <input type="submit"  class="btn green" name="submit" value="Update" id="submit"/>


 </div>
  </form>

</div>
</body>
</html>
