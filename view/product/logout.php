<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $_SESSION['success'] = "See you soon " . $_SESSION['user'];
    $_SESSION['login'] = false;
    $_SESSION['user'] = "";
    $_SESSION['userid'] = "";
    
    header('Location: login.php ');
}
?>