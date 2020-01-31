

<?php
session_start();
$db=mysqli_connect("localhost","root","","kruzeri");
if(isset($_POST['dugme-log'])){
    $mail=$_POST['email'];
	$pass=$_POST['sifra'];
	
	$sql="SELECT * FROM putnici WHERE email='$mail' AND sifra='$pass'";
	$rezultat=mysqli_query($db,$sql)or die("podaci se ne slazu".mysqli_error($db));
	
	$red=mysqli_fetch_array($rezultat);
	if($red['email']==$mail && $red['sifra']==$pass){
		$_SESSION['slika']=$slika;
		header("location:home.php");
	}
	else{
		echo "neuspesno";
	}
}
?>
