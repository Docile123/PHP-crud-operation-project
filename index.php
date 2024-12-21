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
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <div>
      <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="username">
    </div>
    <div>
      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>
   
      <div class="form-check mt-4">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="rememberme">
        <label class="form-check-label" for="flexCheckDefault">
          Remember Me
        </label>
      </div>
     
    <div class="mt-4">
    <button type="submit" class="btn btn-success w-100" name="login">LOGIN</button>
    </div>
</form>

</div>
</body>
</html>