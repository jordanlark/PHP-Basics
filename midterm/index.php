<?php
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


<form action="pub_detail.php" method="GET">
<?php
while($row = mysqli_fetch_array($result)){
  echo '<article class="margin-sm clearfix panel panel-default">';
  echo  '<h3 class="name padding-xsm">' . $row['name'] . '</h3>';
  echo  '<p class="padding-xsm">' . $row['expertise']. ' - ' . $row['email'] . '</p>';
  echo '<a class="padding-xsm" href="pub_detail.php?id='.$row['id'].'">Detail view</a>';
  echo  '</article>';
}
?>
</form>
  </div>



</body>
</html>
