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
<script src="scripts/objavaNovosti.js"></script>
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
			if($_REQUEST["prijava"] == "Promijeni lozinku"){
				header("Location: promijeniPassword.php"); 
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
    <a href="#" onclick="return sort('sve');">Sve novosti</a>
    <a href="#" onclick="return sort('dnevne');">Dnevne novosti</a>
    <a href="#" onclick="return sort('sedmicne');">Sedmične novosti</a>
	<a href="#" onclick="return sort('mjesecne');">Mjesečne novosti</a>
  </div>
  <form id="sort" method = "post" action="index.php">
      <input type="submit" name="sortABC" value="Sortiraj abecedno">
	  <input type="submit" name="sortTime" value="Sortiraj vremenski">
      <input type="hidden" name="action" value="sort">
    </form>
</div>

<?php
		if (isset($_SESSION["username"]) ) {
			print "<p>Dobrodošao/la <i>".$_SESSION["username"]."</i></p>";
				   	}
?>



<?php
					if (isset($_SESSION["username"]) && $_SESSION["username"] != "admin" ) {
						print "<form action='index.php' method='post'>
					<input type='submit' name='prijava' value='Promijeni lozinku'></input>	
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
	
	<div id="vijesti">
		
				<?php
						
						
						function sortirajPoDatumu($a, $b) {	
							return strtotime($a['datum']) < strtotime($b['datum']);
						}
						
						function sortirajPoAbecedi($a, $b){
							$a = strtoupper($a);
							$b = strtoupper($b);
							return $a['naslov'] > $b['naslov'];
						}
						
						if(!isset($_GET['vijest'])){
							$veza = new PDO("mysql:dbname=bhmountain;host=localhost;charset=utf8", "root", "root");
							$veza->exec("set names utf8");
							$cv1 = $veza->query("select id, naslov, slika, tekst, datum from vijest");
							$upit2 = $veza->query("select count(*) as broj from vijest;");
							$broj_novosti = $upit2->fetch(PDO::FETCH_ASSOC);
						
						if(isset($_POST['sortABC'])){
							$cv1 = $veza->query("select id, naslov, slika, tekst, datum from vijest ORDER BY naslov ASC");
							
							foreach($cv1 as $cv) 
							{
								print "<div class='novost'>
										<img src='".$cv['slika']."' />
											<h4>".$cv['naslov']."</h4>
											<p>".$cv['tekst']."</p>
											<p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv['datum']."+02:00'></time>.</p>
									</div>";
							}
						}
						elseif(isset($_POST['sortTime'])){
							$cv1 = $veza->query("select id, naslov, slika, tekst, datum from vijest ORDER BY datum DESC");
							foreach($cv1 as $cv) 
							{
								print "<div class='novost'>
										<img src='".$cv['slika']."' />
											<h4>".$cv['naslov']."</h4>
											<p>".$cv['tekst']."</p>
											<p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv['datum']."+02:00'></time>.</p>
									</div>";
							}
						}
						else{
							
							
							foreach($cv1 as $cv) 
							{
								print "<div class='novost'>
										<img src='".$cv['slika']."' />
											<h4>".$cv['naslov']."</h4>
											<p>".$cv['tekst']."</p>
											<p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv['datum']."+02:00'></time>.</p>
									</div>";
						}
					}
				}
				elseif(isset($_GET['vijest'])){
						$var = (string)$_GET['vijest'];
						$avtor = 0;
						$v = new PDO("mysql:dbname=bhmountain;host=localhost;charset=utf8", "root", "root");
								$v->exec("set names utf8");
						$cv1 = $v->query("SELECT naslov, slika, tekst, datum, autor FROM vijest WHERE id='".$var."'");
								foreach($cv1 as $cv)
								{
									print "<div class='novost'>
										<img src='".$cv['slika']."' />
											<h4>".$cv['naslov']."</h4>
											<p>".$cv['tekst']."</p>
											<p class='objavljeno'>Objavljeno<time class='vrijemeObjave' datetime='".$cv['datum']."+02:00'></time>.</p>
									</div>";
									$avtor = $cv['autor'];
								}
						
						$temp='1';
							$imalKomentara = $v->query("SELECT komentar FROM vijest WHERE id='".$var."'");
							foreach($imalKomentara as $cv)
							{
								$temp = $cv['komentar'];
							}
							if($temp == '1'){
								//prikaz forme za unos
								
								print "	<form id='dodaj-komentar' action='index.php?vijest=".$var."' method='POST'> 
											<textarea name='comment' id='comment' placeholder='Napiši komentar'></textarea>
											<input type='submit' id='dodajKomentarBtn' name='dodajKomentarBtn'  value='Postavi'/>
											</form>
									";
								print "<div id='komentari'><h3>Komentari:</h3>";
							//prikaz komentara
								$cv2 = $v->query("SELECT tekst FROM komentar WHERE vijest='".(string)$var."'");
								
									foreach($cv2 as $cv)
									{
										$cx = $v->query("SELECT ime FROM korisnik WHERE id='".(string)$avtor."'");
										foreach($cx as $c)
										{
											print "<div class='komentarParent'><p><b>".$c['ime']." wrote: </b>".$cv['tekst']."</p></div>";
										}
										
								}
								
								//ako je pritisnut button dodajKomentarBtn
								if(isset($_POST['dodajKomentarBtn']) && !empty($_POST['comment'])){
									$kom = $_POST['comment'];
									
									$cv3 = $v->query("INSERT INTO komentar SET tekst = '".(string)$kom."', odgovor = '0', vijest = '".(string)$var."';");
									
								}
								
								print "</div>";
							}
							else print "	<div class='komentarParent'><p>Komentari za ovu vijest su onemogućeni!</p>
											</div>
									";
							
					}
				
			?>
		
	</div>
	
</body>



</html>