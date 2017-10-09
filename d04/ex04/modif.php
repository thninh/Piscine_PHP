<?php

	$filename = '../private/passwd';

	if ($_POST['login'] === "" || $_POST['oldpw'] === "" || $_POST['newpw'] === "" || $_POST['submit'] === "" || $_POST['submit'] !== "OK")
		echo "ERROR\n";
	else
	{
		$modif = unserialize(file_get_contents($filename));
		$user_exist = 0;
		foreach ($modif as $key => $value)
		{
			if ($value['login'] === $_POST['login'] &&
				$value['passwd'] === hash("whirlpool", $_POST['oldpw']))
				$user_exist = 1;
				$modif[$key]['passwd'] = hash("whirlpool", $_POST['newpw']);
		}
		if ($user_exist === 1)
		{
			file_put_contents($filename, serialize($modif));
			header('Location: index.html');
			echo "OK\n";
		}
		else {
			echo "ERROR\n";
		}
	}
?>
