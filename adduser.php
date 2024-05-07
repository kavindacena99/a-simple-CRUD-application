<?php
    require_once 'connection.php';
?>
<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
    }

    $signup = isset($_POST['signup']);

    $errorArr = array("pswdError");

    if($signup){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mail = $_POST['mail'];
        $pswd = $_POST['pswd'];
        $cpswd = $_POST['cpswd'];
        
        if($pswd == $cpswd){
            $sql10 = "INSERT INTO users (fname,lname,mail,pswd) VALUES('{$fname}','{$lname}','{$mail}','{$pswd}')";
            $result = mysqli_query($connection,$sql10);    

            if(isset($result)){
                header("Location: users.php");
                //echo "record inserted";
            }else{
                echo "record not inserted";
            }
        }else{
            $errorArr[0] = "pswdErrorOK";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Users</title>
    <style>
        *{box-sizing: border-box;margin: 10px;}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Add New User</h1>

    <form action="adduser.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">First Name</label>
    <input type="text" name="fname" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Last Name</label>
    <input type="text" name="lname" class="form-control" id="exampleInputPassword1">
  </div>
  <?php
    if($errorArr[0] == "pswdErrorOk"){
        echo "
        <div class='mb-3'>
            <label for='exampleInputPassword1' class='form-label'>Password</label>
            <input type='password' name='pswd' style='background-color:red;' class='form-control' id='exampleInputPassword1'>
        </div>
        <div class='mb-3'>
            <label for='exampleInputPassword1' class='form-label'>Confirm Password</label>
            <input type='password' name='cpswd' class='form-control' style='background-color:red;' id='exampleInputPassword1'>
        </div>
        ";
    }else{
        echo "
        <div class='mb-3'>
            <label for='exampleInputPassword1' class='form-label'>Password</label>
            <input type='password' name='pswd' class='form-control' id='exampleInputPassword1'>
        </div>
        <div class='mb-3'>
            <label for='exampleInputPassword1' class='form-label'>Confirm Password</label>
            <input type='password' name='cpswd' class='form-control' id='exampleInputPassword1'>
        </div>
        ";
    }
  ?>
  <button type="submit" name="signup" class="btn btn-primary">Submit</button>
  </form>
</body>
</html>