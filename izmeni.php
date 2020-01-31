<?php
session_start();
 $db=mysqli_connect("localhost","root","","kruzeri");
 $brod=$_POST['izbor'];
 $ime=$_POST['ime'];
 
 if(isset($_POST['promeni'])){
	 $upit="UPDATE putnici SET ID_brod='$brod' WHERE ime LIKE '$ime'";
	 $_SESSION['msg']='Uspesno ste promenili brod';
	 $rez=mysqli_query($db,$upit);
	 $_SESSION['msg']='Uspesno ste promenili brod';
	 header("location:home.php");
 }
?>