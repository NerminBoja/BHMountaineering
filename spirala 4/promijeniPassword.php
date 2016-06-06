<?php
session_start();

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
			<li>
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
	
	
	<div>
		<div>
			<div >
				<h2>Prijava u sistem</h2>
				<form action="promijeniPassword.php" method="post">
					<table>
						<tr>
							<td>
								<input name="password" type="password" placeholder="Password">
							</td>
						</tr>
						<tr id="trPrezimeVal">
							<td style="width:208px;">
								<?php
									$veza = new PDO("mysql:dbname=bhmountain;host=localhost;charset=utf8", "root", "root");
									$veza->exec("set names utf8");
									$idUser = $veza->query("select id from korisnik where username = '".$_SESSION['username']."';");
									
									
									
									$promijenjen = false;
									if (isset($_POST['prijava']) && !empty($_POST['password'])) 
									{
										$pass = md5($_POST['password']);
										
										$login = $veza->query("select username, password from korisnik;");
										$unosVijesti = $veza->query("INSERT INTO korisnik SET password = '".(string)$pass."' where id ='".idUser."' ;");
										
										
				
									}
									
      							?>
								
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="promjena" value="Promijeni"></input>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>

</body>



</html>