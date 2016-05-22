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
				<form action="login.php" method="post">
					<table>
						<tr>
							<td>
								<input name="username" type="text"  placeholder="Username">
							</td>
						</tr>
						<tr>
							<td>
								<input name="password" type="password" placeholder="Password">
							</td>
						</tr>
						<tr id="trPrezimeVal">
							<td style="width:208px;">
								<?php
									if (isset($_REQUEST['username']) && isset($_REQUEST['password']) ) {
										$autenticiran = false;
										if (($handle = fopen("korisnickiPodaci.csv", "r")) !== FALSE) {
											$novosti = array();
										        
										    while (($data = fgetcsv($handle, 1000, ".")) !== FALSE) {
										        if($_REQUEST['username'] == $data[0] && sha1($_REQUEST['password']) == $data[1]){
										        	$autenticiran = true;
										        	break;
												}
										    }
										    fclose($handle); 
										}
										//provjera korisnika
										if($autenticiran){
											$_SESSION["username"] = $_REQUEST['username'];
											header("Location: index.php"); 
											exit();
										}
										else
        									print "<p>Molimo provjerite vaš username i password.</p>";
      								}
      							?>
								
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit"  value="Prijava"></input>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>

</body>



</html>