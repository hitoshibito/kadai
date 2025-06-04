<?php
    session_start();
    $_SESSION['admin_login'] = false;

    session_destroy();
    header('location:./login.php');
?>