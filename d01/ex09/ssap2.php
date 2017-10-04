#!/usr/bin/php
<?php
	function ft_split($chaine)
	{
		$tab = array_slice(array_filter(explode(" ", $chaine)), 0);
		return ($tab);
	}

	$tab = array();

	if ($argc > 1)
	{
		$ssap = array_filter(explode(" ", implode(" ", $argv)), 'strlen');
		unset($ssap[0]);
		// $i = 1;
		// while ($argv[$i])
		// {
		// 	$tab = array_merge($tab, ft_split($argv[$i]));
		// 	$i++;
		// }
		// $ssap =  implode(" ", $tab);
		foreach ($ssap as $check)
		{
			if (ctype_alpha($check))
				$alpha[] = $check;
			else if (is_numeric($check))
				$num[] = $check;
			else
				$spc[] = $check;
		}
		($alpha) ? natcasesort($alpha) : 1;
		($num) ? natcasesort($num) : 1;
		($spc) ? natcasesort($spc) : 1;
		$ssap2 = array_merge((array)$alpha, (array)$num, (array)$spc);
		$aff = implode("\n", array_slice(array_filter($ssap2), 0));
		echo $aff;
		echo "\n";

		// if ($argc == 2)
		// {
		// 	$tab = explode(" ", $argv[1]);
		// 	$aff = implode(" ", array_slice(array_filter($tab), 0));
		// 	echo $aff;
		// 	echo "\n";
		// }
	}
?>
