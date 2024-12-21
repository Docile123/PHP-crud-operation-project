<?php
include("conn.php");
require_once("process.php");
if(!isset($_SESSION['username'])){
  header("location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS|login</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-light">
    
<div class="container d-flex flex-column justify-content-between my-2 px-2 py-3 bg-white rounded">
  <a class="btn btn-secondary btn-md mb-3" href="view.php">BACK TO TABLE</a>
<h4 class="text-center text-success font-weight-bold">UPDATE YOUR INFORMATION</h4>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <div>
      <label for="exampleInputEmail1" class="form-label mt-4">Employee name</label>
      <input type="text" class="form-control"  placeholder="Enter employee_name..." required name="employee_name">
    </div>
    <div>
      <label  class="form-label mt-4">Employee email</label>
      <input type="email" class="form-control"  placeholder="Enter employee_email..." required name="employee_email">
    </div>
    <div>
      <label  class="form-label mt-4">Employee phone</label>
      <input type="text" class="form-control"  placeholder="Enter employee_phone..." name="employee_phone">
    </div>
    <div>
      <label  class="form-label mt-4">Employee position</label>
      <input type="text" class="form-control"  placeholder="Enter employee postion..." name="employee_position">
    </div>
    <div>
      <label  class="form-label mt-4">Employee address</label>
      <input type="text" class="form-control"  placeholder="Enter employee_address..." name="employee_address">
    </div>
   
   
    <div class="mt-4">
    <button type="submit" class="btn btn-success w-100" name="register_employee">Submit</button>
    </div>
</form>

</div>
</body>
</html>