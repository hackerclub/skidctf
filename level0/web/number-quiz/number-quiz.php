<html>
<head>
	<title>kiddie | web | number quiz</title>
</head>
<body>
<h3> NUMBER QUIZ 2000 </h3>

<?php

	echo "Can you solve this?";
	echo "<br>";
	echo "<span style='color:blue'>" . rand() . "</span>";
	echo " + ";
	echo "<span style='color:orange'>" . rand() . "</span>";
	echo " = ?";
	echo "<form method='POST'>";
	echo "<input name='number' type='text'>";
	echo "<input type='hidden' name='correct' value='false'>";
	echo "</form>";

	if ($_POST['correct'] === "true")	
	{
		echo "<b><div style='color:green'> CORRECT </div></b>";
		echo "flag{math_sux}";
		echo "<br>";
	}
	if ($_POST['correct'] === "false")
	{
		echo "<b><div style='color:red'> INCORRECT </div></b>";
		echo "<br>";
	}


?>

</body>
</html>
