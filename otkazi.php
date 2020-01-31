<?php 
 session_start();
 
 $kon=mysqli_connect("localhost","root","","kruzeri");
 $des=$_POST['vrednost'];
 
 if(isset($_POST['izbrisi'])){
	 $upit="DELETE FROM destinacija WHERE ID_des='$des'";
	 $rez=mysqli_query($kon,$upit);
	 
	 $_SESSION['msg']='Putovanje otkazano';
	 header("location:home.php");
 }
?>