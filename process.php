<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['register_employee'])){
    extract($_POST);

    foreach($_POST as $key=>$value){
     $tr = trim($value);
     $_POST[$key] = htmlspecialchars($tr);
    }
    
    $sanitizedname = filter_var($employee_name, FILTER_SANITIZE_STRING);
    $sanitizedemail = filter_var($employee_email, FILTER_SANITIZE_EMAIL);
    $sanitizedphone = filter_var($employee_phone, FILTER_SANITIZE_STRING);
    $sanitizedposition = filter_var($employee_position, FILTER_SANITIZE_STRING);
    $sanitizedaddress = filter_var($employee_address, FILTER_SANITIZE_STRING);

    $checking = mysqli_query($connection,"SELECT * FROM workers WHERE email='$sanitizedemail'");
    if(mysqli_num_rows($checking)>=1){
        echo '
        <script>
        alert("Employee is already existed")
        </script>
        ';
    }
    else{
    $insertqry =mysqli_query($connection,"INSERT INTO workers(employee_name,email,phone,position,address)VALUES('$sanitizedname','$sanitizedemail','$sanitizedphone','$sanitizedposition','$sanitizedaddress')");
    if($insertqry){
        echo '
        <script>
        alert("Employee is already inserted")
        </script>
        ';  
    }
    else{
        echo '
        <script>
        alert("Employee is already existed")
        </script>
        '.mysqli_connect_error($connection);
    }
    }

     }
     //INSERT INTO USERS
     if(isset($_POST['save_user'])){
        extract($_POST);
        $encryptPassword = password_hash($password,PASSWORD_DEFAULT);
        $checking = mysqli_query($connection,"SELECT * FROM user WHERE username='$username'");
        if(mysqli_num_rows($checking)>=1){
            echo '
            <script>
            alert("User is already existed")
            </script>
            ';
        }
        else{
            $insertqry =mysqli_query($connection,"INSERT INTO user(username,password)VALUES('$username','$encryptPassword')");
        if($insertqry){
            echo '
            <script>
            alert("user is already inserted")
            </script>
            ';  
        }
        else{
            echo '
            <script>
            alert("user is already existed")
            </script>
            '.mysqli_connect_error($connection);
        }
    
        }
    
     }

     // LOGIN TO SYSTEM

    if(isset($_POST['login'])){
     extract($_POST);
   $checking = mysqli_query($connection,"SELECT * FROM user WHERE username = '$username'");
    if(mysqli_num_rows($checking)===0){
        echo'<script>
        alert("Invalid credentials")
        </script>';
    }
    else{
        $row = mysqli_fetch_assoc($checking);
        if(password_verify($password,$row['password'])){
            $_SESSION['username']= $username;
            header("location: view.php");
           
        }
        else{
            echo'
            <script>Invalid credentials!!</script>
            ';

        }
    }
    if(isset($_POST['rememberme'])){
    setcookie("username",$username,time()+(7*60*60*24),'/');
        }
   }
   //UPDATE 
   if(isset($_POST['update'])){
    extract($_POST);
    foreach($_POST as $key=>$value){
     $tr = trim($value);
     $_POST[$key] = htmlspecialchars($tr);
    }
    
    $sanitizedname = filter_var($employee_name, FILTER_SANITIZE_STRING);
    $sanitizedemail = filter_var($employee_email, FILTER_SANITIZE_EMAIL);
    $sanitizedphone = filter_var($employee_phone, FILTER_SANITIZE_STRING);
    $sanitizedposition = filter_var($employee_position, FILTER_SANITIZE_STRING);
    $sanitizedaddress = filter_var($employee_address, FILTER_SANITIZE_STRING);

    $checking = mysqli_query($connection,"SELECT * FROM workers WHERE email='$sanitizedemail' AND id !='$id'");
    if(mysqli_num_rows($checking)>=1){
        echo '
        <script>
        alert("There is another Employee with this email in the system Use another email  or back to system")
        </script>
        ';
    }
    else{
    $updateqry =mysqli_query($connection,"UPDATE workers SET employee_name='$sanitizedname',email='$sanitizedemail',phone='$sanitizedphone',position='$sanitizedposition',address='$sanitizedaddress' WHERE id='$id'");
    if($updateqry){
        echo '
        <script>
        alert("Employee info is updated successfully")
        </script>
        ';  
    }
    else{
        echo '
        <script>
        alert("Failed")
        </script>
        '.mysqli_connect_error($connection);
    }
    }

     }
    
}



?>