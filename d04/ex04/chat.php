<?php
	if ($_SESSION['logged_on_user'] === "")
		echo "ERROR\n";
	else
	{
		$chat = unserialize(file_get_contents('../private/chat'));
		foreach ($chat as $key => $value) {
			echo "[".date("H:i", time())."] <b>".$value['login']."</b>: ".$value['msg']."<br />";
		}
	}
?>
