
<?php
session_start();
$db=mysqli_connect("localhost","root","","kruzeri");
if(isset($_POST['dugme-reg'])){
	
	$ime=trim($_POST['ime']);
	$prezime=trim($_POST['prezime']);
	$mail=trim($_POST['email']);
	$pass=trim($_POST['sifra']);
	$slika = $_FILES['slika']['name'];
	$slika_tmp = $_FILES['slika']['tmp_name'];
	$pass2=trim($_POST['sifra2']);
	$brod=trim($_POST['izbor-broda']);
	
	 move_uploaded_file($slika_tmp,"$slika");

	
	
	if($pass==$pass2){
		$sql="INSERT INTO putnici(ime,prezime,email,sifra,slika,	ID_brod) VALUES('$ime','$prezime','$mail','$pass','$slika','$brod')";
		mysqli_query($db,$sql);
		$_SESSION['slika']=$slika;
		$_SESSION['ime']=$ime;
		header("location:home.php");
	}
}
$ime=trim($ime);
$prezime=trim($prezime);
$mail=trim($mail);
$pass=trim($pass);
$brod=trim($pass);

?>



<!DOCTYPE html>
<html>
    <head>
        <title>home</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stilovi.css">
    </head>
    <body>
        <header>
            <a href="zaposlenje.html">Zaposlenje</a>
            <a href="index2.html">Uloguj se</a>
            <a href="index.html">Početna</a>
        </header>
        <div class="main">
            <h1>PRIJAVITE SE ILI REGISTRUJTE I IZABERITE BROD KOJIM BISTE PUTOVALI!</h1>
            <div class="forma-login">
                <h3>Prijavite se:</h3>
                    <form method="POST" action="log.php">
                     Unesite e-mail:<br>
                     <input type="email" name="email"><br>
                     Unesite password:<br>
                     <input type="password" name="sifra"><br>
                     <input type="submit" name="dugme-log" value="Ulogujte se">
                    </form>
            </div>

            <div class="forma-login">
                <h3>Registrujte se:</h3>
                <form method="POST" action="register.php">
                  Unesite ime:<br>
                  <input type="text" name="ime"><br>
                  Unesite prezime:<br>
                  <input type="text" name="prezime"><br>
                  Unesite e-mail:<br>
                  <input type="email" name="email"><br>
                  Unesite password:<br>
                  <input type="password" name="sifra"><br>
                  Ponovite password:<br>
                  <input type="password" name="sifra2"><br>
                  Izaberite brod kojim želite da putujete:<br>
                  <select name="izbor-broda">
                      <option name="izbor-broda" value="1">1</option>
                      <option name="izbor-broda" value="2">2</option>
                      <option name="izbor-broda" value="3">3</option>
                      <option name="izbor-broda" value="4">4</option>
                  </select>
                  <input type="submit" name="dugme-reg" value="Registrujte se">
                </form>   
            </div>
            <h2>Naša flota:<br></h2>
                <div class="brodovi">
                    <img src="tropico.jpg"><p>br. broda <strong>1</strong><br>'Tropico',<br>kapacitet:1000 mesta</p>
                    <img src="sparcle.jpg"><p>br. broda <strong>4</strong><br>'Sparcle',<br>kapacitet:800 mesta</p>
                    <img src="pearl.jpg"><p>br. broda <strong>2</strong><br>'Pearl',<br>kapacitet:2000 mesta</p>
                    <img src="crystal.jpg"><p>br. broda <strong>3</strong><br>'Crystal',<br>kapacitet:1500 mesta</p>
                </div>
            
               
            
        </div>
    </body>
</html>