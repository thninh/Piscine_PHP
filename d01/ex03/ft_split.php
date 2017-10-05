<?php
	function ft_split($chaine)
	{
		$tab = array_slice(array_filter(explode(" ", $chaine)), 0);
		sort($tab);
		return ($tab);
	}
?>
