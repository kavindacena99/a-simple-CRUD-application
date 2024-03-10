<?php 
    require_once 'connection.php';
?>
<?php
    //session check
    session_start();
    
    if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
    }



    $id = $_GET['user_id'];

    echo $id;

    $sql5 = "DELETE FROM users WHERE userid = {$id} ";
    $result = mysqli_query($connection,$sql5);

    if($result){
        header("Location: users.php");
    }
?>