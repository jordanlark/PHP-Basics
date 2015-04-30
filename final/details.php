<?php

require_once('variables.php');

$id = $_GET[id];

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
$query = "SELECT * FROM final WHERE id=$id";
$result = mysqli_query($dbconnect, $query) or die('display movie stuff query failed');

$query1 = "SELECT * FROM final_comments WHERE movie_title=$id";
$result1 = mysqli_query($dbconnect, $query1) or die('display comments query failed');

function showComment(){
  if(isset($_COOKIE['username'])){
    echo '<br><button type="button" class="btn submit" data-toggle="modal" data-target="#leaveComment"><i class="fa fa-comment"></i> Comment</button>';
  }
}
  function convertStars($starsnum){
    switch($starsnum){
      case 'one':
        $stars = '<i class="fa fa-star"></i>';
        break;
      case 'two':
        $stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i>';
        break;
      case 'three':
        $stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
        break;
      case 'four':
        $stars ='<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
        break;

    }
    return $stars;
  }

 ?>
<?php
include 'head.php';
include 'nav.php'; ?>
<div class="container">

  <h1>Movies and such</h1>

  <?php

  while ($row = mysqli_fetch_array($result)){
  // $idnumber = $row['id'];
  echo '<article class="pull-left article-thing col-md-12">';
  echo '<img src="images/' .$row['photo'] . '" alt="picture of '.$row['title'].'" class="pull-left clearfix" />' . '<h2>'.$row['title'].'</h2>';
  echo '<p><strong> Rating: </strong>'. $row['rating'] .'</p>';
  echo '<strong> Synopsis: </strong><p>'. $row['synopsis'] .'</p>';
  showComment();
  echo '</article>';

    echo '<div class="modal fade" id="leaveComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

  <form action="addComment.php?id='.$row['id'].'" method="POST" enctype="multipart/form-data">
    '.$row['id'].'
      <div class="form-group">
        <h1>Give feedback on '.$row['title'].'</h1>
        <label>Rate the movie</label>
        <input type="radio" name="stars" value="one" ><i class="fa fa-star"></i>
        <input type="radio" name="stars" value="two" ><i class="fa fa-star"></i><i class="fa fa-star"></i>
        <input type="radio" name="stars" value="three"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
        <input type="radio" name="stars" value="four"><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
      </div>

      <label>Leave a comment</label>
      <textarea class="form-control input-group" rows="3" name="comments" placeholder="*please keep it under 450 charaters" required></textarea><br>

      <button type="submit" class="btn submit margin-sm">Submit</button>
    </form>

          <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


          </div>

        </div>
      </div>
    </div>';
  echo '<hr>';
  echo '<h3>User Comments</h3>';

    while($row1 = mysqli_fetch_array($result1)){

      echo '<h4>' . $row1[user] . ' ' . '<small>'.convertStars($row1[stars]).'</small>' . '</h4>';
      echo '<p>'.$row1[comments].'</p>';






    }


  }

  mysqli_close($dbconnect);
   ?>
 </body>
</html>
