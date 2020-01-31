<?php 
session_start();
session_destroy();
unset($_SESSION['ime']);
header("location:index2.html");
?>