<?php
session_start();

if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
    
}

header("location:index.php");
    session_unset();
    session_destroy();
    die();
?>