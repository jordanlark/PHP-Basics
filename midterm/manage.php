<?php
require_once('auth.php');
require_once('variable.php');
// ---- connect to db using - host, user, pw, db ----
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
// ---- build query ----
$query = "SELECT * FROM midterm";
$result = mysqli_query($dbconnect, $query) or die('run query failed');

  include 'head.php';

?>
<body>
  <div class="container padding-sm">

  <h1 class="padding-sm">Research Group Employees</h1>

<?php include 'nav.php'; ?>

<a href="add.php" class="padding-sm"><i class="fa fa-plus"></i> Add new employee</a>
<form action="pub_detail.php" method="get">
<?php
  while($row = mysqli_fetch_array($result)){
  echo '<article class="margin-sm padding-sm clearfix panel panel-default">';
    echo  '<p class="name">';
       echo $row['name'];
    echo  '</p>';
    echo  '<p>';
       echo  $row['expertise']. ' - ' . $row['email'];
    echo  '</p>';
    echo '<a href="admin_detail.php?id='.$row['id'].'">Detail view - </a> <a href="update.php?id='.$row['id'].'">Update</a> <a href=delete.php?id='.$row['id'].'> - Delete</a>';

    echo  '</article>';
 }
?>
</form>

  </div>
</body>
</html>
