<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Tabela</title>
<link rel="stylesheet" type="text/css" href="style.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

		<div id="meni">
		<ul>
			<li>
				<a href="index.php">Naslovnica</a>
			</li><li class="odabrani">
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
	
		<table id="tabela">
		<tr class="naslovni-red">
			<th>Planina</th>
			<th>Lokacija</th>
			<th>Nadmorska visina</th>
			<th>Najveći vrh</th>
			<th>Tehnička zahtjevnost ture</th>
			<th>Kondiciona zahtjevnost ture</th>
		</tr>
		<tr>
			<td>Bitovnja</td>
			<td>Bradina</td> 
			<td>1728.18 m</td>
			<td>Lisin</td>
			<td class="plavo">1</td>
			<td class="zeleno">b</td>
		</tr>
		<tr>
			<td>Crvanj</td>
			<td>Sjeveroistočna Hercegovina</td> 
			<td>1920 m</td>
			<td>Zimomor</td>
			<td class="zeleno">2</td>
			<td class="narancasto">d</td>
		</tr>
		<tr>
			<td>Čvrsnica</td>
			<td>Sjeverna Hercegovina</td> 
			<td>2228 m</td>
			<td>Pločno</td>
			<td class="zeleno">2</td>
			<td class="narancasto">d+</td>
		</tr>
		<tr>
			<td>Bjelašnica</td>
			<td>Centralna Bosna i Hercegovina</td> 
			<td>2067 m</td>
			<td>Bjelašnica</td>
			<td class="narancasto">4</td>
			<td class="narancasto">d</td>
		</tr>
		<tr>
			<td>Čabulja</td>
			<td>Hercegovina</td> 
			<td>1776 m</td>
			<td>Velika Vlajna</td>
			<td class="plavo">1</td>
			<td class="narancasto">d</td>
		</tr>
		<tr>
			<td>Jahorina</td>
			<td>Centralni dio Bosne i Hercegovine</td> 
			<td>1916 m</td>
			<td>Ogorjelica</td>
			<td class="plavo">1</td>
			<td class="zeleno">b</td>
		</tr>
		<tr>
			<td>Konjuh</td>
			<td>Sjevernoistočna Bosna</td> 
			<td>1327 m</td>
			<td>Vrh Konjuha</td>
			<td class="plavo">1</td>
			<td class="plavo">a</td>
		</tr>
		<tr>
			<td>Lelija</td>
			<td>Istočna Hercegovina</td> 
			<td>2032 m</td>
			<td>Velika Lelija</td>
			<td class="plavo">1</td>
			<td class="zuto">c</td>
		</tr>
		<tr>
			<td>Maglić</td>
			<td>Granica Bosne i Hercegovine i Crne Gore</td> 
			<td>2396 m</td>
			<td>Veliki Vitao</td>
			<td class="narancasto">4</td>
			<td class="narancasto">d</td>
		</tr>
		<tr>
			<td>Prenj</td>
			<td>Istočna Hercegovina</td> 
			<td>2032 m</td>
			<td>Velika Lelija</td>
			<td class="zuto">3</td>
			<td class="narancasto">d</td>
		</tr>
		<tr>
			<td>Treskavica</td>
			<td>Centralna Bosna i Hercegovina</td> 
			<td>2088 m</td>
			<td>Mala Ćaba</td>
			<td class="zeleno">2</td>
			<td class="zuto">c</td>
		</tr>
	</table>
	
</body>



</html>