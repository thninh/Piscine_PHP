#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$tab = explode(" ", $argv[1]);
		$aff = implode(" ", array_slice(array_filter($tab), 0));
		echo $aff;
		echo "\n";
	}
?>
