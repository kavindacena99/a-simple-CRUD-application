<?php
    require_once 'connection.php';
?>
<?php
    session_start();

    $_SESSION = array();

    $sql3 = "UPDATE users SET onoroff=0 WHERE userid = '{$_SESSION['user_id']}' LIMIT 1";
    $result3 = mysqli_query($connection,$sql3);

    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '',time()-86400, '/');
    }

    session_destroy();

    header("Location: index.php");
?>