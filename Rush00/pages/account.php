<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Kids toys</title>
		<link rel="icon" href="pictures/logo_page2.jpg" />
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body class="set_page">
		<header>
		</header>
		<h1 class="logo_du_page">Sign in</h1><br />
		<form action="login.php" method="POST">
			Account : <input class="log" type="text" name="login" /><br/>
			Password: <input class="log" type="password" name="passwd" /><br/>
			<input class="submit" type="submit" name="submit" value="Connect"><br />
			<a href="login.php?page=create">Create an account ?</a><br />
			<a href="login.php?page=modify">Modified password ?</a><br />
			<a href="index.php">Cancel</a><br /><br />
		</form>
		<center><img class="toto1" src="pictures/totoro1.gif" alt="bienvenue"></center>
	</body>
</html>
