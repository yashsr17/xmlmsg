<?php session_start();
unset($_SESSION['semail']);
unset($_SESSION['pass']);
header('location:login.php');
?>