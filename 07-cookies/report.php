<?php

  require_once('protect.php');
  include 'head.php';
 ?>
<body>
    <div class="container">
      <?php include 'nav.php' ?>

      <h1>Order some cookies!</h1>

      <form class="form-horizontal">


<div class="form-group">
  <label class="col-sm-2 control-label">Name</label>
  <div class="col-sm-10">
    <input type="password" class="form-control"  placeholder="Name">
  </div>
</div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Chocolate Chip
        </label>
        <label>
          <input type="checkbox"> Peanutbutter
        </label>
        <label>
          <input type="checkbox"> Snickerdoodle
        </label>
        <label>
          <input type="checkbox"> Oatmeal Rasin
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label"># of Boxes</label>
    <div class="col-sm-10">
      <input type="num" class="form-control" placeholder="3">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Place order</button>
    </div>
  </div>
</form>




    </div>
</body>
</html>
