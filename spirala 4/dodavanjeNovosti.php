<?php
	session_start();
date_default_timezone_set('Europe/Sarajevo');	
	if (!isset($_SESSION["username"]) ) {
		header("Location: index.php"); 
		exit();
	}
	
if(isset($_POST['postavi']))
				{
					 $naslov=htmlspecialchars($_REQUEST['naslov']);
					 $tekst=htmlspecialchars($_POST['opis']);
					 $slika=htmlspecialchars($_REQUEST['slika']);
					 $tel = htmlspecialchars($_REQUEST['tel']);
					 $datum1 = date("Y-m-d");
					 $datum2 = date("H:i:s");	
					 $datum = $datum1."T".$datum2;
					 $komentar = '0';
					if(isset($_POST['imaKomentar'])) 
						$komentar = "1";
					
					 if(!empty($_POST['naslov']) && !empty($_POST['opis']) && !empty($_POST['slika']) && !empty($_POST['tel']))
						{
						$naslov=$_POST['naslov'];
						$veza = new PDO("mysql:dbname=bhmountain;host=localhost;charset=utf8", "root", "root");
						$veza->exec("set names utf8");
					     $idAdmina = $veza->query("select id from korisnik where username = '".(string)$_SESSION['username']."';");
						$idA = $idAdmina->fetch(PDO::FETCH_ASSOC);
						 $unosVijesti = $veza->query("INSERT INTO vijest SET naslov = '".(string)$naslov."', tekst = '".(string)$tekst."', slika = '".(string)$slika."', datum = '".(string)$datum."', komentar = '".(string)$komentar."';");
						
						
						 if(!$unosVijesti){
							echo 'greska';
							echo $veza->errorInfo()[2];
							}
						 $idAdmina = null;
						 $unosVijesti = null;
						 $veza=null;
						 
						}
						
					
				}
					
			


	

?>

<!DOCTYPE html>
<html>
<head>
<title>Dodavanje novosti</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="scripts/sortiranjeVijesti.js"></script>
<script src="scripts/datum.js"></script>
<script src="scripts/data.js"></script>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

		<div id="meni">
		<ul>
			<li>
				<a href="index.php">Naslovnica</a>
			</li><li>
				<a href="tabela.php">Planinske ture</a>
			</li><li>
				<a href="kontakt.php">Kontakt</a>
			</li><li>
				<a href="linkovi.php">Linkovi</a>
			</li>
			<li class="odabrani">
				<?php
						if (isset($_SESSION["username"]) ) {
				       		print "<a href='DodavanjeNovosti.php'>Dodavanje novosti</a>";
				   		}
				?>
			</li>
		</ul>

		</div>
	<div>
	<div class="wrap"><a href="index.html"><i class="ikona"><i></i><i></i><i></i><i></i><i></i><i></i></i></a>
		<div class="TriDe_naslov">
		<div>BHMountaineering</div></div></div>
	</div>

<?php
		if (isset($_SESSION["username"]) ) {
			print "<p>Dobrodošao/la <i>".$_SESSION["username"]."</i></p>";
				   	}
?>



<?php
					if (isset($_SESSION["username"]) && $_SESSION["username"] != "admin" ) {
						print "<form action='index.php' method='post'>
					<input type='submit' name='promjenaLozinke' value='Promijeni lozinku'></input>	
              <input type='submit' name='prijava' value='Odjava'></input>    			  
		  </form>";
      				}
      				else if (isset($_SESSION["username"]) && $_SESSION["username"] == "admin" ){
      					print "<form action='index.php' method='post'>
              
              <input type='submit' name='prijava' value='Odjava'></input> 
			     			  
		 </form>";
      				}
					else{
      					print "<form action='index.php' method='post'>
              
              <input type='submit' name='prijava' value='Prijava'></input>
			     			  
		 </form>";
      				}
      			?>

	<div id="homepage">
	<form id="forma-kontakt" name="dodavanjeNovostiForm" action="dodavanjeNovosti.php" method="post" >
	<h2>Forma za dodavanje novosti</h2><br><br>
	    <label>Sva polja sa * su obavezna.</label><br>
		<div class="kontakt-podaci"><input type="text"   placeholder="Naslov" name="naslov" required></div><br>
		<div class="kontakt-podaci"><label>Opis:</label><textarea  name='opis' rows='10' cols='50'  required></textarea></div><br>
		<div class="kontakt-podaci"><label>Url slike:</label><input type='text'  name="slika"  required></input></div><br>
		<div class="kontakt-podaci"><label><small>Kod države</small></label><input type='text' name='kod' id='kod'/></div><br>
		<div class="kontakt-podaci"><label><small>Broj telefona</small></label><input type='text' name='tel' id='tel'/></div><br>
		<div class="kontakt-podaci"><label><small>Omogući komentare?</small></label></div>
		<input type="checkbox" name="imaKomentar" value="Da">Da<br>
		
		<br><br>
		<button class="button-posalji" type="submit" name='postavi' value='Postavi'>Postavi</button>		
	</form>
	</div>
	
</body>



</html>