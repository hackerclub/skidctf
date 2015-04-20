<html>
<head>
	<title>kiddie | web | admin-only</title>
</head>

<?php

	if ($_COOKIE['admin'] === NULL)
	{
		setcookie("admin", "0");
	}

	if ($_COOKIE['admin'] === "1")
	{
		echo "Welcome Admin:";
		echo "<br>";
		echo "flag{you_hacked_a_cookie}";
		setcookie("admin", "0");
	}
	else 
	{
		echo "Admins ONLY";		
	}

?>
</html>
