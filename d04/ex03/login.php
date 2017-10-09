<?php

	include ("auth.php");

	session_start();
	$check = 0;
	if ($_GET['login'] && $_GET['passwd'])
	{
		if (auth($_GET['login'], $_GET['passwd']))
		{
			$_SESSION['logged_on_user'] = $_GET['login'];
			$check = 1;
		}
		else {
			$_SESSION['logged_on_user'] = "";
			$check = 0;
		}
		if ($check === 1)
			echo "OK\n";
		else
			echo "ERROR\n";
	}

?>
