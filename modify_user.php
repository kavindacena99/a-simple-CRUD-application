<?php
    require_once 'connection.php';
?>
<?php
    session_start();
    
    if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
    }
?>
<?php
    $uid = $_GET['user_id'];

    if(isset($_POST['modify'])){
      $mail = mysqli_real_escape_string($connection,$_POST['newemail']);
      $fname = mysqli_real_escape_string($connection,$_POST['newfname']);
      $lname = mysqli_real_escape_string($connection,$_POST['newlname']);

      $sql1 = "UPDATE users SET fname = '{$fname}', lname = '{$lname}', mail = '{$mail}' WHERE userid = $uid";
      $result = mysqli_query($connection,$sql1);

      if(isset($result)){
        header("Location: users.php");
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User</title>
    <style>
        *{box-sizing: border-box;margin: 10px;}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Modify User Details</h1>
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="newemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">First Name</label>
    <input type="text" name="newfname" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Last Name</label>
    <input type="text" name="newlname" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="modify" class="btn btn-primary">Submit</button>
  </form>
<a href="adduser.php">+ Add User</a>
</body>
</html>