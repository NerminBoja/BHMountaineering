<?php
	function sortByVrijeme($a, $b) {
    	return $b['vrijemeObjave'] - $a['vrijemeObjave'];
	}
	function sortByAbecedno($a, $b) {
    	return strcmp(strtolower($a['naslov']), strtolower($b['naslov']));
	}
	if (isset($_REQUEST['req'])) {
		$req = $_REQUEST['req'];
	}
	
	$tmpx = array();
	$file="novosti.csv";
	$csv= file_get_contents($file);
	$array = array_map("str_getcsv", explode("\n", $csv));
	
	foreach ($array as $value) {
		if($value[0] !== null && $value[1] !== null && $value[2] !== null && $value[3] !== null && $value[4] !== null){
			$tmp =  array( 'naslov' => $value[0], 'opis' => $value[1],'image' => $value[2], 'alt' => $value[3], 'vrijeme_objave' => $value[4] );
			array_push($tmpx, $tmp);
		}
	}
	if($req == 'true') usort($tmpx, 'sortByVrijeme');
	else if($req == 'false') usort($tmpx, 'sortByAbecedno');
	$json = json_encode($tmpx);
	echo $json;
?>

<?php
  
  $niz = $polja = array();
    
    $action ="";
    if(isset($_POST["action"])){
      $action = $_POST["action"];
    }
    function readNews()
    {
    
      $niz = $polja = array();
      $i = 0;
      $handle = fopen("novosti.csv", "r");
      if($handle)
      {
        while(($red = fgetcsv($handle)) !== false)
        {
          if(empty($polja))
          {
            $polja = $red;
            continue;
          }
          foreach($red as $kljuc => $vrijednost)
          {
            $vrijednost = str_replace('&#44;', ',', $vrijednost);
            $niz[$i][$polja[$kljuc]] = $vrijednost;
          }
          $i++;
        }
        fclose($handle);      
    }         
     return $niz;
  }
  function ABCcompare($a, $b)
  {
    return strtolower($a["Header"]) > strtolower($b["Header"]);
  }
  function datesCompare($a, $b)
  {
    $a = strtotime($a["Date"]);
    $b = strtotime($b["Date"]);
    return $a < $b;
  }
  $niz = readNews();
  if($action == "sort")
        usort($niz, "ABCcompare");
      else
        usort($niz, "datesCompare");
?>
