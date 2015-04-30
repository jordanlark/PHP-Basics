<?php

if(isset($_POST['submit'])){
  $name = $_POST[name];
  //HERE IS A STRING FUNCION*******
  $flavor = trim($_POST[flavor]);
  $day = $_POST[day];
  $month = $_POST[month];
  $year = $_POST[year];
  $birthday = $day.'_'.$month.'_'.$year;
  require_once('variables.php');

  $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

  $query1 = "INSERT INTO flavor (name, birthday, flavor) VALUES('$name', '$birthday', '$flavor')";
   $result1 = mysqli_query($dbconnect, $query1) or die('login query failed');

  mysqli_close($dbconnect);

  header('Location: index.php');
}

 ?>
 <?php
 include 'head.php';
 include 'nav.php'; ?>
 <div class="container">

  <form action="form.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm well">

      <span>Name</span><input type="text" name="name" value="" class="form-control inputs" required>


    <h3>Birthday</h3>
    <span>Month</span>
      <select name="month" class="form-control bday">
        <option>Month</option>
        <option>01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
        <option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
      </select>
    <span>Day</span>
    <select name="day" class="form-control bday">
      <option>Day</option>
      <option>01</option>
      <option>02</option>
      <option>03</option>
      <option>04</option>
      <option>05</option>
      <option>06</option>
      <option>07</option>
      <option>08</option>
      <option>09</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
      <option>13</option>
      <option>14</option>
      <option>15</option>
      <option>16</option>
      <option>17</option>
      <option>18</option>
      <option>19</option>
      <option>20</option>
      <option>21</option>
      <option>22</option>
      <option>23</option>
      <option>24</option>
      <option>25</option>
      <option>26</option>
      <option>27</option>
      <option>28</option>
      <option>29</option>
      <option>30</option>
      <option>31</option>
    </select>

      <span>Year</span><input type="number" name="year" value="" class="form-control bday" required>

      <div class="form-group">
        <br><br>
        <span>Suggest new flavors and get a free pint of ice cream on your birthday!<br> Must submit at least five original flavors. Search for exsisting flavors <a href="serch.php">here.</a></span>
         <textarea name="flavor" class="form-control" rows="8" cols="5"></textarea>
      </div>


      <button type="submit" class="btn btn-default submit-btn" name="submit">Submit</button

      </div>
    </form>

</div>
</body>
</html>
<!-- Please enter the flavors you desire to recive each month. You are allowed one per month, and two in your birthday month.The second is on us! Pick from the following flavors, or suggest your own:
Bananas Foster,
Raspberry nut,
Cherries Jubilee,
Burnt Almond Fudge,
Superman,
Cotton Candy,
Dark Chocolate Oreo,
Blueberry Blast,
Mint Cookie Dough,
Lunar Cheesecake,
Orange and Chocolate,
Cinnamon Churro,
Blue Daiquiri,
Heath Bar Crunch,
Jamoca Almond,
Lemon Spice,
Bubblegum,
Pistachio Almond,
Red Velvet,
Pralines n Cream,
Pineapple Coconut,
Rum Raisin,
Triple Grape,
Marshmallow Mousse.</label> -->
