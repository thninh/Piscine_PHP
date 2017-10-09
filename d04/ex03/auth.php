<?php

	function auth($login, $passwd)
	{
		$filename = '../private/passwd';
		if ($login === "" || $passwd === "")
			return (false);
		else
		{
			$exist = 0;
			$read = unserialize(file_get_contents($filename));
			foreach($read as $key => $value)
			{
				if ($login === $value['login'] &&
				$value['passwd'] === hash("whirlpool", $passwd))
					$exist = 1;
			}
			if ($exist === 1)
				return (true);
			else
				return (false);
		}
	}
?>
