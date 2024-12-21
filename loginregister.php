<?php
include("conn.php");
require_once("process.php");
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
<h4 class="text-center text-success font-weight-bold">USERS LOGIN REGISTER</h4>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <div>
      <label  class="form-label mt-4">username</label>
      <input type="email" class="form-control"  placeholder="Enter username..." required name="username">
    </div>
    <div>
      <label  class="form-label mt-4">Password</label>
      <input type="password" class="form-control"  placeholder="Enter password..." required name="password">
    </div>
   
   
    <div class="mt-4">
    <button type="submit" class="btn btn-success w-100" name="save_user">Submit</button>
    </div>
</form>

</div>
</body>
</html>