<nav class="clearfix">

  <p class="welcome pull-right">
    <?php
        if(isset($_COOKIE['username'])){
          echo 'Hello, ';
          echo $_COOKIE['name'];
          echo ' | <a href="logout.php"><i class="fa fa-user-times"></i> log out</a>';
        }else{
          echo '<a href="login.php"> <i class="fa fa-user-plus"></i> Log in</a>';
        }

     ?>
  </p>

<ul class="nav nav-pills padding-sm nav-items">
  <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="search.php"><i class="fa fa-search"></i> Search</a></li>
  <li><a href="admin.php"> <i class="fa fa-shield"></i> Admin</a></li>
</ul>



</nav>
