#!/usr/bin/php
<?php
	$i = 1;
	if ($argc > 1)
	{
		while ($argv[$i])
		{
			echo $argv[$i];
			echo "\n";
			$i += 1;
		}
	}
?>
