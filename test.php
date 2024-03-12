<?php
    require_once 'connection.php';

    if(isset($_POST['submit'])){
        $fname = mysqli_real_escape_string($connection,$_POST['fname']);
        $lname = mysqli_real_escape_string($connection,$_POST['lname']);
        $email = mysqli_real_escape_string($connection,$_POST['mail']);
        $pswds = mysqli_real_escape_string($connection,$_POST['pswds']);

        $statement = $connection->prepare("INSERT INTO users (firstname,lastname,mail,pswd) VALUES(?,?,?,?)");
        $statement->bind_param("ssss",$fname,$lname,$email,$pswds);

        if($statement->execute()){
            echo "Account is successfully added";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="post">
        <input type="text" name="fname" id="">
        <input type="text" name="lname" id="">
        <input type="email" name="mail" id="">
        <input type="password" name="pswds" id="">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>