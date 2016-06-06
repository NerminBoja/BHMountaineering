<?php
	
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
					
					 if(!empty($_POST['naslov']) && !empty($_POST['tekst']) && !empty($_POST['slika']) && !empty($_POST['tel']))
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