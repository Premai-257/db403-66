<?
session_start();
unset($_SESSION['user']);
header('location:signin.php');
?>