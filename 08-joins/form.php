<?php
require_once('variables.php');
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM chef_specialty";
$resultSpec = mysqli_query($dbconnect, $query) or die('select specialty query failed');

$query2 = "SELECT * FROM chef_skills";
$resultSkills = mysqli_query($dbconnect, $query2) or die('select skills query failed');


include 'head.php';
 ?>
  <body>
    <?php include 'nav.php'; ?>
      <div class="container">

<h2>Add New Chef</h2>
  <form action="saveToDB.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">
    <div class="form-group ">
      <span class="green">First Name<input type="text" name="first" value="" class="form-control" required></span>
    </div>

      <div class="form-group">
        <span class="green">Last Name <input type="text" name="last" value="" class="form-control" required ></span>
      </div>

    <div class="form-group">
      <div class="radio">
        <span>
          <input type="radio" name="gender" value="1">
          Male
        </span>
      </div>
      <div class="radio">
        <span>
          <input type="radio" name="gender"  value="2">
          Female
        </span>
      </div>
    </div>

    <div class="form-group">
      <span class="green">Email <input type="email" name="email" value="" class="form-control" required></span>
    </div>

<!--pull from db to populate drop down -->
<div class="form-group">
  <span class="green">Specialty <select name="specialty" class="form-control skills-list">
  <option>Please Select . . .</option>
    <?php
      while($row = mysqli_fetch_array($resultSpec)){
      echo '<option value="'.$row['spec_id'].'">'. $row['value'] .'</option>';
    };

     ?>
  </select></span>
</div>

<hr>
<span class="green">Select Cooking Skills</span>
<br>
<?php
  while($row2 = mysqli_fetch_array($resultSkills)){
   echo '<span><input type="checkbox" value="'.$row2['id'].'" name="skills[]">'.$row2['value'].'</span>';
   echo '<br>';
  };
?>

  <button type="submit" class="btn btn-default submit-btn" name="submit">Sign up!</button

  </div>
  </form>

</div>
</body>

</html>
