<?php

	$filename = 'private/passwd';

	if("" === $_POST['login'] || "" === $_POST['passwd'] || "" === $_POST['submit'] || $_POST['submit'] !== "OK")
		echo "ERROR\n";
	else
	{
		if (!file_exists('private'))
			mkdir ("private");
		$info = [];
		if (file_exists($filename))
		{
			$read = file_get_contents($filename);
			$info = unserialize($read);
		}
		$in_folder = 0;
		foreach ($info as $key => $value) {
			if ($value['login'] === $_POST['login'])
				$in_folder = 1;
		}
		if ($in_folder == 1)
			echo "ERROR\n";
		else {
			$add['login'] = $_POST['login'];
			$add['passwd'] = hash("whirlpool", $_POST['passwd']);
			$info[] = $add;
			file_put_contents($filename, serialize($info));
			// header('Location: index.html');
			echo "OK\n";
		}
	}

?>
