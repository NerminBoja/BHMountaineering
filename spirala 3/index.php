<?php
session_start();
date_default_timezone_set('Europe/Sarajevo');

?>

<!DOCTYPE html>
<html>
<head>
<title>Naslovna</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="scripts/sortiranjeVijesti.js"></script>
<script src="scripts/datum.js"></script>
<script src="scripts/data.js"></script>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
		if (isset($_REQUEST["prijava"]) ) {
			if($_REQUEST["prijava"] == "Prijava"){
				header("Location: login.php"); 
				exit();
			}
			if($_REQUEST["prijava"] == "Odjava"){
				session_unset();
				header("Location: index.php"); 
				exit();
			}
		}
?>

		<div id="meni">
		<ul>
			<li class="odabrani">
				<a href="index.php">Naslovnica</a>
			</li><li>
				<a href="tabela.php">Planinske ture</a>
			</li><li>
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
	<div class="wrap"><a href="index.html"><i class="ikona"><i></i><i></i><i></i><i></i><i></i><i></i></i></a>
		<div class="TriDe_naslov">
		<div>BHMountaineering</div></div></div>
	</div>
	
<div class="dropdown">
  <button onclick="dropFunction()" class="dropbtn">Vremensko filtriranje</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#" onclick="return sortiranje('sve');">Sve novosti</a>
    <a href="#" onclick="return sortiranje('dnevno');">Dnevne novosti</a>
    <a href="#" onclick="return sortiranje('sedmicno');">Sedmične novosti</a>
	<a href="#" onclick="return sortiranje('mjesecno');">Mjesečne novosti</a>
  </div>
  <form id="sort" method = "post" action="index.php">
      <input type="submit" value="Sortiraj abecedno">
      <input type="hidden" name="action" value="sort">
    </form>
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
	
	<div id="vijesti">
		
		
	</div>
	
</body>



</html>