<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Kontakt</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="scripts/validacijaForme.js"></script>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

		<div id="meni">
		<ul>
			<li>
				<a href="index.php">Naslovnica</a>
			</li><li>
				<a href="tabela.php">Planinske ture</a>
			</li><li class="odabrani">
				<a href="kontakt.php">Kontakt</a>
			</li><li>
				<a href="linkovi.php">Linkovi</a>
			</li>
			<li>
				<?php
						if (isset($_SESSION["username"]) ) {
				       		print "<a href='dodavanjeNovosti.php'>Dodavanje novosti</a>";
				   		}
				?>
			</li>
		</ul>
		</div>
	<div>
	<div class="wrap"><a href="index.html"><i class="ikona"><i></i><i></i><i></i><i></i><i></i><i></i></i></a><div class="TriDe_naslov">BHMountaineering</div></div>
	</div>
	<?php
		if (isset($_SESSION["username"]) ) {
			print "<p>Dobrodošao/la <i>".$_SESSION["username"]."</i></p>";
				   	}
?>
<?php
					if (isset($_SESSION["username"]) ) {
						print "<form action='index.php' method='post'>
              <input type='submit' name='prijava' value='odjava'>Odjava</input>    			  
		  </form>";
      				}
      				else{
      					print "<form action='index.php' method='post'>
              
              <input type='submit' name='prijava' value='Prijava'></input>
			     			  
		 </form>";
      				}
      			?>
	<div id="homepage">
	<form id="forma-kontakt">
	<h2>Kontakt forma</h2><br><br>
	    <label>Sva polja sa * su obavezna.</label><br>
		<label>Osnovni podaci: </label><br>
		<div class="kontakt-podaci"><input type="text" onkeyup="validacijaImenaIPrezimena(this)"  placeholder="Ime i prezime*" required></div><br>
		<div class="kontakt-podaci"><input type="email" onkeyup="validacijaEmail(this)" placeholder="e-mail*" pattern="[^ @]*@[^ @]*" required></div><br>
		<div class="kontakt-podaci"><input type="text" onkeyup="validacijaNaslova(this)" placeholder="Naslov*" required></div><br>
		<label>Starost: </label><br>
		<div class="kontakt-podaci"><input type="number" min="1" max="150" step="1" value="18" name="Godine"></div><br>
		<label>Telefon: </label><br>
		<div>
			<input type="radio" id="1" onclick="validacijaIzboraOperatera()" name="operater" value="Bhtelecom"> BH Telecom
			<input type="radio" id="2" onclick="validacijaIzboraOperatera()" name="operater" value="Mtel"> Mtel
			<input type="radio" id="3" onclick="validacijaIzboraOperatera()" name="operater" value="Eronet"> Eronet
			<input type="radio" id="4" onclick="validacijaIzboraOperatera()" name="operater" value="Haloo"> Haloo
			<input type="radio" id="5" onclick="validacijaIzboraOperatera()" name="operater" value="Happy"> Happy<br><br>
		</div>
		<div class="kontakt-podaci"><input type="tel" onkeyup="validacijaTelefona(this)" name="tel" id="telefon" placeholder="xxx-xxx-xxx(x)" ></div><br>
		<label>Poruka:* </label><br>
		<textarea  name="poruka" required></textarea><br><br><br>
		<button class="button-posalji" type="submit">Pošalji</button>
	</form>
	</div>
</body>



</html>