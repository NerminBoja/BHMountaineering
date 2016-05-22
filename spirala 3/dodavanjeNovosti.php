<?php
	session_start();
date_default_timezone_set('Europe/Sarajevo');	
	if (!isset($_SESSION["username"]) ) {
		header("Location: index.php"); 
		exit();
	}
	
	function novostUCSV()
    {
      $putanja = "novosti.csv";
      $file = fopen($putanja, "a");
      $naslov = $_POST["naslov"];   
      $sadrzaj = $_POST["opis"];
      $img = $_POST["slika"];
	  $imgDesc = $_POST["opisSlike"];
      
      
      $naslov = str_replace(PHP_EOL, ' ', $naslov);
      $sadrzaj = str_replace(PHP_EOL, ' ', $sadrzaj);
      $naslov = str_replace(',', '&#44;', $naslov);
      $sadrzaj = str_replace(',', '&#44;', $sadrzaj);
      $datum = time()*1000;
      $text = $naslov.",".$sadrzaj.",".$img.",".$imgDesc.",".$datum.PHP_EOL;
      fwrite($file, $text);
      fclose($file);
    }
    if(isset($_POST["postaviNovost"]))
    {  
          novostUCSV();
    }
?>
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
					if (isset($_SESSION["username"]) ) {
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
	<form id="forma-kontakt" name="dodavanjeNovostiForm" action="dodavanjeNovosti.php" method="post" onSubmit="getPath();"  enctype="multipart/form-data">>
	<h2>Forma za dodavanje novosti</h2><br><br>
	    <label>Sva polja sa * su obavezna.</label><br>
		<div class="kontakt-podaci"><input type="text"   placeholder="Naslov" name="naslov" required></div><br>
		<div class="kontakt-podaci"><label>Opis:</label><textarea  name='opis' rows='10' cols='50'  required></textarea></div><br>
		<div class="kontakt-podaci"><label>Url slike:</label><input type='text'  name="slika"  required></input></div><br>
		<div class="kontakt-podaci"><label>Opis slike:</label><input type='text'  name="opisSlike" required></input></div><br>
		
		<br><br>
		<button class="button-posalji" type="submit" name='postaviNovost' value='Postavi'>Postavi</button>		
	</form>
	</div>
	
</body>



</html>