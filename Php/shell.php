<?php

/*
** Shell Sort Algorithm
*/

namespace php;

require("Algoritmo.php");
require("Gerador.php");

class Shell extends Algoritmo {
	
	public function run($vector, $gap = 2) 
	{
		echo "** Processando com GAP de <b>".$gap."</b><br>";
		$current = count($vector) / $gap;
		$current = intval($current);
		
		while($current > 0)
		{
			for($a = 0; ($current+$a) < count($vector); $a++)
			{
				if($vector[$a] > $vector[$current + $a]) {
					$aux = $vector[$a];
					$vector[$a] = $vector[$current + $a];
					$vector[$current + $a] = $aux;			
				}
			}
			
			$current /= $gap;
			$current = intval($current);		
		}
		
		$current = 0;
		
		for($a = 0; $a < count($vector); $a++, $current++)
		{
			for($b = $current; $b > 0; $b--)
			{
				if($vector[$b-1] > $vector[$b]) {
					$aux = $vector[$b];
					$vector[$b] = $vector[$b-1];
					$vector[$b-1] = $aux;
				}
			}
		}
		
		return $vector;
	}
}

if(isset($_POST['vector'])) {
	$shell = new Shell();
	printv($shell->run($_POST['vector']));
}