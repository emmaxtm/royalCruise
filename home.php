<?php
 session_start();
error_reporting( E_ALL & ~E_NOTICE ^ E_DEPRECATED );
 ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stilovi.css">
    </head>
    <body>
    <header>
    
    <a href="index2.html">Uloguj se</a>
    <a href="index.html">Početna</a>
</header>
   <div class="main"><center><h1>Dobrodošli,<?php echo $_SESSION['ime']?></h1> 
              
			<img src="<?php $_SESSION['slika']?>" height="100px" width="100px">
						</center>
						
		<div class="content"><p>Ovde se možete informisati o plovidbama  koje organizuje naša kompanija, kao i o kapetanima   koji će biti na dužnosti tokom plovidbe!<br><br></p>
		<table>
		 <tr>
		   <th>IME KAPETANA</th>
		   <th>PREZIME KAPETANA</th>
		   <th>NAZIV BRODA</th>
		 </tr>
		 <?php
		   $kon=mysqli_connect("localhost","root","","kruzeri");
		   $upit="SELECT zaposleni.ime,zaposleni.prezime,brod.naziv FROM zaposleni INNER JOIN brod ON zaposleni.ID_brod=brod.ID_brod ";
		   $rezultat=mysqli_query($kon,$upit);
		   if(mysqli_num_rows($rezultat) > 0)  
                          {  
                               while($row = mysqli_fetch_array($rezultat))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["ime"];?></td>  
                               <td><?php echo $row["prezime"]; ?></td>
                               <td><?php echo $row["naziv"]; ?></td>						   
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
		 
        </table><br><br>
		<table>
		  <tr>
		   <th>NAZIV DESTINACIJE</th>
		   <th>TRAJANJE PLOVIDBE</th>
		 </tr>
		 <?php
		   $kon2=mysqli_connect("localhost","root","","kruzeri");
		   $upit2="SELECT destinacija.naziv,plovidba.trajanje_plovidbe FROM plovidba  INNER JOIN destinacija ON destinacija.ID_des=plovidba.ID_des ";
		   $rezultat2=mysqli_query($kon2,$upit2);
		   if(mysqli_num_rows($rezultat2) > 0)
			   {  
                               while($row = mysqli_fetch_array($rezultat2))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["naziv"]; ?></td>
                               <td><?php echo $row["trajanje_plovidbe"]; ?></td>						   
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
		 </table><br><br>
		 <form method="post" action="pretraga.php">
		 <p>Pretraži destinaciju:<br></p>
		 <p>Naziv:<br>
		 <input type="text" name="naziv"><br>
		 <p>Pristaniste:<br>
		 <input type="text" name="pristaniste" value= <?php echo $_SESSION['pristaniste']; ?>> <br>
		 
		 <input type="submit" name="trazi" value="pretraga"><br>
		 </form><br><br>
		 <p>Promenite izbor broda:<br>
		 <form method="post" action="izmeni.php">
		 <input type="radio" name="izbor" value="1">Tropico<br>
		 <input type="radio" name="izbor" value="2">Pearl<br>
		 <input type="radio" name="izbor" value="3">Crystal<br>
		 <input type="radio" name="izbor" value="4">Sparcle<br>
		 Unesite ime:<input type="text" name="ime"><br>
		  <input type="submit" name="promeni" value="promeni"><br>
		  <br><br>
		  </form>
		  <form method="post" action="otkazi.php">
		  Izbrisi destinaciju:<br>
		  Izaberite vrednost:<br>
		  <select name="vrednost">
		    <option name="vrednost" value="11">11</option>
			<option name="vrednost" value="12">12</option>
			<option name="vrednost" value="13">13</option>
			<option name="vrednost" value="14">14</option>
			<option name="vrednost" value="15">15</option>
			<option name="vrednost" value="16">16</option>
			<option name="vrednost" value="17">17</option>
			<option name="vrednost" value="18">18</option>
			<option name="vrednost" value="19">19</option>
		  </select>
		  <input type="submit" name="izbrisi" value="izbrisi"><br>
   <a href="logout.php">Izlogujte se</a>
   </div>
   
    </body>
</html>