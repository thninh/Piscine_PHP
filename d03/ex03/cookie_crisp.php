<?php

	$name = $_GET['name'];

	if ($_GET['action'])
	{
		if ($_GET['action'] === "get" && $_COOKIE[$name])
			echo $_COOKIE[$name]."\n";
		if ($_GET['action'] === "set" && $_GET['value'])
			setcookie($name, $_GET['value'], time() + (60*60*24*30));
		if ($_GET['action'] === "del")
			setcookie($name, "", time() - 3600);
	}

?>
