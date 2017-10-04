#!/usr/bin/php
<?php
	function ft_split($chaine)
	{
		$tab = array_slice(array_filter(explode(" ", $chaine)), 0);
		return ($tab);
	}

	$i = 1;
	$tab = ft_split($argv[1]);
	if ($argc > 1)
	{
		while ($tab[$i])
		{
			echo $tab[$i]." ";
			$i++;
		}
		echo $tab[0]."\n";
	}
?>
