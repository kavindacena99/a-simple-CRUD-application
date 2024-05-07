<?php
    require_once 'connection.php';
?>
<?php
    session_start();

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($connection,$_POST['mail']);
        $pswd = mysqli_real_escape_string($connection,$_POST['pswd']);

        $sql1 = "SELECT * FROM users WHERE mail='{$email}' AND pswd='{$pswd}' ";
        $result = mysqli_query($connection,$sql1);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['userid'];

            //$sql3 = "UPDATE users SET onoroff=0 WHERE userid = '{$_SESSION['user_id']}' LIMIT 1";
            //$result3 = mysqli_query($connection,$sql3);

            header("Location: users.php");
        }else{
            echo "Invalid PSWD or MAIL";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{box-sizing: border-box;margin: 10px;}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Login Page</h1>
<form action="index.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pswd" class="form-control" id="exampleInputPassword1">
  </div>
  <button name="login" type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>