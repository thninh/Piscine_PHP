<?php
	session_start();

	if ($_SESSION['logged_on_user'] === "")
	{
		echo "ERROR\n";
		exit;
	}
	else
	{
		if ($_POST['msg'])
		{
			if (!file_exists('../private'))
				mkdir ("../private");
			$speak = [];
			if (file_exists('../private/chat'))
				$speak = unserialize(file_get_contents('../private/chat'));
			$fd = fopen("../private/chat", "w");
			flock($fd, LOCK_EX);
			$mess['login'] = $_SESSION['logged_on_user'];
			$mess['msg'] = $_POST['msg'];
			$mess['time'] = time();
			$speak[] = $mess;
			file_put_contents('../private/chat', serialize($speak));
			fclose($fd);
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
		<form action="speak.php" method="POST">
			<input type="text" name="msg" /><br />
			<input type="submit" name="submit" value="send">
		</form>
	</body>
</html>
