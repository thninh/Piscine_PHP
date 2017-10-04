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
		$i = 1;
		while ($argv[$i])
		{
			$tab = array_merge($tab, ft_split($argv[$i]));
			$i++;
		}
		sort($tab);
		echo implode("\n", $tab);
		echo "\n";
	}
?>
