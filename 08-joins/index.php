<?php
 $queryAddition= '';
if(isset($_GET[specialty_id])){
 $queryAddition = "WHERE specialty_id=$_GET[specialty_id]";
}

 require_once('variables.php');
 $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query1 = "SELECT * FROM chef INNER JOIN chef_specialty ON (chef_specialty.spec_id = chef.specialty_id) $queryAddition ORDER BY id";
$result1 = mysqli_query($dbconnect, $query1) or die('display query failed');

include 'head.php';
 ?>
 <body>

    <?php include 'nav.php';?>

   <div class="container">
    <h2>Pick a chef, Matey</h2>

<?php

 if(mysqli_num_rows($result1) == 0){
    echo 'Sorry nothing matches your search';
};


  while($row = mysqli_fetch_array($result1)){
    echo '<div class="well list-chefs col-md-3">';
    echo '<i class="fa fa-cutlery"></i> ' . $row['first'] . ' ';
    echo $row['last'] . ' ';
    echo 'specializes in ' . $row['value'] . '  cuisine. ';
    echo ($row['gender'] == 1 ? 'He' : 'She');
    echo ' has the following skills: ';


    $currentID = $row[id];

     $query2 = "SELECT * FROM chef_skillSet INNER JOIN chef_skills ON (chef_skillSet.skill_id = chef_skills.id) WHERE chef_id=$currentID";
     $result2 = mysqli_query($dbconnect, $query2) or die('skills query failed');

    //display all of info for each chef
     while($row2 = mysqli_fetch_array($result2)){
       echo '<ul>';
       echo '<li>' . $row2['value'] . '</li>';
       echo '</ul>';

    }; //end row2 while loop

    echo '</div>';

 };// end while loop
?>


</div>
  </body>
</html>
