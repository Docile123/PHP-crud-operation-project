<?php
include("conn.php");
require_once("process.php");


if(!isset($_SESSION['username'])){
  header("location: index.php");
}


if(isset($_GET['logout'])){
  session_destroy();
  header("location: index.php");
}

if(isset($_GET['delete'])){
  $id =$_GET['delete'];
  $deteteqry = mysqli_query($connection,"DELETE FROM workers WHERE id='$id'");
  if($deteteqry){
    echo '<script>
    alert("Successsfully deleted");
    </script>';
  }
  else{
    echo '<script>
    alert("Failed");
    </script>'.mysqli_connect_error($connection);
  }
}

$records = mysqli_query($connection,"SELECT * FROM workers")
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-light">
    <div class="container  px-2 py-3 bg-white">

    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">employee_name</th>
      <th scope="col">employee_email</th>
      <th scope="col">employee_phone</th>
      <th scope="col">position</th>
      <th scope="col">employee_address</th>
      <th scope="col">created_at</th>
      <th scope="col">ACTION</th>
      
    </tr>
  </thead>
  <tbody>
    <?php $i=0; while($rows = mysqli_fetch_assoc($records)){?>
    <?php extract($rows); ?>

    <tr class="table-hover">
      <th scope="row"><?php $i++; echo $i;?></th>
      <td><?php echo $employee_name;?></td>
      <td><?php echo $email;?></td>
      <td><?php echo $phone;?></td>
      <td><?php echo $position;?></td>
      <td><?php echo $address;?></td>
      <td><?php echo $created_at;?></td>
      <td>
        <div class="btn-group">
          <a href="?delete=<?php echo $id;?>" class="btn btn-danger m-1 rounded">DELETE</a>
          <a href="update.php?employee=<?php echo $id;?>" class="btn btn-info m-1 rounded">UPDATE</a>
        </div>
      </td>
    </tr>
     <?php  } ?>
  </tbody>
</table>

</div>
<div class="container mt-4 d-flex flex-column justify-content-between">
<a href="?logout" class="btn btn-primary btn-sm mb-2">LOGOUT</a>
<a href="register.php" class="btn btn-primary btn-sm">ADD NEW EMPLOYEE</a>
</div>
</body>
</html>