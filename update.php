
<?php
include("conn.php");
require_once("process.php");
if(isset($_GET['employee'])){
  $employee=$_GET['employee'];
  $row = mysqli_query($connection, "SELECT * FROM workers WHERE id='$employee'");
  if($row  && mysqli_num_rows($row)>0){
    $record  =mysqli_fetch_assoc($row);
    extract($record);
  }
  else{
    header("location: view.php");
  }
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
   <div class="container d-flex justify-content-between mx-2 my-2">
     <a href="view.php" class="btn btn-success btn-sm w-20">BACK TO VIEW</a>
   </div> 
<div class="container d-flex flex-column justify-content-between my-2 px-2 py-3 bg-white rounded">
    <h4 class="text-center text-success font-weight-bold">UPDATE YOUR INFORMATION</h4>
<form action=" " method="POST">
  <input type="hidden"  name="id" value="<?php echo $id; ?>">
    <div>
      <label for="exampleInputEmail1" class="form-label mt-4">Employee name</label>
      <input type="text" class="form-control"  placeholder="Enter employee_name..." required name="employee_name" value="<?php echo $employee_name; ?>">
    </div>
    <div>
      <label  class="form-label mt-4">Employee email</label>
      <input type="email" class="form-control"  placeholder="Enter employee_email..." required name="employee_email" value="<?php echo $email; ?>">
    </div>
    <div>
      <label  class="form-label mt-4">Employee phone</label>
      <input type="text" class="form-control"  placeholder="Enter employee_phone..." name="employee_phone" value="<?php echo $phone; ?>">
    </div>
    <div>
      <label  class="form-label mt-4">Employee position</label>
      <input type="text" class="form-control"  placeholder="Enter employee postion..." name="employee_position" value="<?php echo $position; ?>">
    </div>
    <div>
      <label  class="form-label mt-4">Employee address</label>
      <input type="text" class="form-control"  placeholder="Enter employee_address..." name="employee_address" value="<?php echo $address; ?>">
    </div>
   
   
    <div class="mt-4">
    <button type="submit" class="btn btn-success w-100" name="update">UPDATE</button>
    </div>
</form>

</div>
</body>
</html>