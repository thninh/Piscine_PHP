<?php

	function auth($login, $passwd)
	{
		$filename = '../private/passwd';
		if ($login === "" || $passwd === "")
			return (false);
		else
		{
			$read = unserialize(file_get_contents($filename));
			foreach($read as $key => $value)
			{
				if ($login === $value['login'] &&
				$value['passwd'] === hash("whirlpool", $passwd))
					return true;
			}
			return false;
		}
	}
?>
