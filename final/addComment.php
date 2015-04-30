<?php

  $stars = trim($_POST[stars]);
  $comments = $_POST[comments];
  $user = $_COOKIE[username];
  $movie_title = $_GET[id];

  require_once('variables.php');

  $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

  $query = "INSERT INTO final_movie_comments (user_id, title_id) VALUES('$user', '$movie_title')";

  $query1 = "INSERT INTO final_comments (stars, comments, user, movie_title) VALUES('$stars', '$comments', '$user', '$movie_title')";

  $result1 = mysqli_query($dbconnect, $query1) or die('login query failed');

  header('Location: index.php');

?>
