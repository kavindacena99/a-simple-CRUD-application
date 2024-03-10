<?php
    require_once 'connection.php';
?>
<?php
    session_start();
    
    if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
    }

    $fname = '';

    $sql11 = "SELECT firstname FROM users WHERE userid={$_SESSION['user_id']}";
    $result11 = mysqli_query($connection,$sql11);

    while($row = mysqli_fetch_assoc($result11)){
        $fname = $row['firstname'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        *{box-sizing: border-box;margin: 5px;}
        .editbtn{
            text-decoration: none;
            color: white;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <h1 style="color: white;">Hi <?php echo $fname; ?></h1>
    </a>
  </div>
</nav>
<br><br><br>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql3 = "SELECT * FROM users";

            if($result_set = $connection->query($sql3)){
                $i = 0;
                while($datarows = $result_set->fetch_array(MYSQLI_ASSOC)){
                    $i++;
                    echo "<tr>" . "<td>" . $i . "</td>" . "<td>" . $datarows['firstname'] . "</td>" . "<td>" . $datarows['lastname'] . "</td>" . "<td>" . $datarows['mail'] . "</td>" . "<td>" . "<button type='button' class='btn btn-primary'><a href=\"modify_user.php?user_id={$datarows['userid']}\" class='editbtn'>Edit</a></button>" . "</td>" ."<td>". "<button type='button' class='btn btn-danger'><a href=\"delete.php?user_id={$datarows['userid']}\" class='editbtn'>Delete</a></button>" . "</td>" ."</tr>";
                }
            }
        ?>
    </tbody>
    </table>

    <br><br>
    <a href="adduser.php" class="editbtn" style="background-color: aqua;padding:15px;">+ Add User</a>
    <a href="logout.php" class="editbtn" style="background-color: red;padding:15px;">Log Out</a>
</body>
</html>