<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Linkovi</title>
<link rel="stylesheet" type="text/css" href="style.css">
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
			</li><li class="odabrani">
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
	<div id="forma-lista-linkova">
	<div id="lista_linkova">
		<h3>Korisni linkovi: </h3>
		<ul>
			<li><a href="http://www.planinarenje.ba">Planinarenje.ba</a></li>
			<li><a href="http://gss.ba/">GSS BiH</a></li>
			<li><a href="http://psbih.ba/">Planinarski savez BiH</a></li>
			<li><a href="http://avantur.ba/">Udruženje za podršku i razvoj sportskog turizma-AVANTUR</a></li>
		</ul>
	</div>
	</div>
	</div>
	
	
</body>



</html>