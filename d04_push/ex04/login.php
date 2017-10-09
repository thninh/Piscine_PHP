<?php

	include ("auth.php");

	session_start();
	$check = 0;
	if ($_POST['login'] && $_POST['passwd'])
	{
		if (auth($_POST['login'], $_POST['passwd']))
		{
			$_SESSION['logged_on_user'] = $_POST['login'];
			$check = 1;
		}
		else {
			$_SESSION['logged_on_user'] = "";
			$check = 0;
		}
		if ($check === 1)
			echo '<!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8" />
					<title>42chat</title>
				</head>
				<body>
					<iframe name="chat" src="chat.php" height="100%" width=550px></iframe>
					<iframe name="speak" src="speak.php" height="100%" width=500px></iframe>
				</body>
			</html>';
		else{
			header('Location: index.html');
			echo "ERROR\n";
		}
	}

?>
