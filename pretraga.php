<?php 
session_start();
$kon=mysqli_connect("localhost","root","","kruzeri");

$naziv_des=$_POST['naziv'];
$pristaniste=$_POST['pristaniste'];
if(isset($_POST['trazi'])){
	$upit="SELECT naziv,pristaniste FROM destinacija WHERE naziv LIKE '$naziv_des'";
	$rez=mysqli_query($kon,$upit);
	if($red=mysqli_fetch_assoc($rez)){
		
		$pristaniste=$red['pristaniste'];
		$_SESSION['naziv']=$naziv_des;
	$_SESSION['pristaniste']=$pristaniste;
	header("location:home.php");
	}
	
	
}
?>