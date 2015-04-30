<?php include 'head.php'; ?>
<body>
<div class="container padding-sm">

<h1 class="padding-sm">Research Group Employees</h1>

<?php include 'nav.php'; ?>


 <h1 class="padding-sm">Add new employee</h1>

  <form action="add2.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group green">
      <span>Full Name <input type="text" name="name" value="" class="form-control" required></span>
    </div>

      <div class="form-group green">
        <span>Expertise <input type="text" name="expertise" value="" class="form-control" required ></span>
      </div>


    <div class="form-group green">
      <span>Phone Number <input type="tel" name="phone" value="" placeholder="8015551245" class="form-control"></span>
    </div>

    <div class="form-group green">
      <span>Email <input type="text" name="email" value="" placeholder="watson@work.com" class="form-control" required></span>
    </div>

    <div class="form-group green">
      <span>Address <input type="text" name="address" value="" placeholder="123 maple" class="form-control"></span>
    </div>

    <div class="form-group green">
      <span>Specialization <input type="textarea" name="specialization" value="" placeholder="JavaScript" class="form-control"></span>
    </div>

    <div class="form-group green">
      <span>Photo<input type="file" name="picture" class="form-control" value=""></span>
    </div>

<button type="submit" class="btn btn-default green-bg" name="submit">Add Employee</button

 </div>
  </form>

</div>
</body>
</html>
