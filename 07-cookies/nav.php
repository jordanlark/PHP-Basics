<nav>


  <p class="welcome">
    <?php
        if(isset($_COOKIE['username'])){
          echo 'Hello, ';
          echo $_COOKIE['first'] . ' ' . $_COOKIE['last'];
          echo ' | <a href="logout.php">log out</a>';
        }else{
          echo '<a href="login.php">Log in</a>';
        }

     ?>
  </p>

  <ul class="nav nav-tab padding-sm">
    <li><a href="index.php"><i class="fa fa-home"></i> home</a></li>
    <?php
        if(isset($_COOKIE['username'])){
          echo '<li><a href="report.php"><i class="fa fa-shopping-cart"></i> order</a></li>
                <li><a href="recipe.php"><i class="fa fa-heart"></i> recipe</a></li>';
        }
  ?>
  </ul>
</nav>
