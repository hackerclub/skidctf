<html>
<head>
	<title> csaw-level | web | visitor </title>
</head>
<body>
<?php
	if ($_GET["source"])
	{
		show_source(__FILE__);
		die();
	}
?>
	
<center>
<h3> Let's choose some tips which are tailored to your browser, </h3>

<?php
	require_once("config/include.php");

	$useragent = $_SERVER["HTTP_USER_AGENT"];
	echo "<h4>" . $useragent . "</h4>";
	
	$useragent= str_replace("/", " ", $useragent);
	$software = explode(" ", $useragent);

	$softwarestr = "(";
	for ($i=0;$i<count($software);$i++)
	{
		$softwarestr .= "'" . $software[$i] . "', ";
	}
	$softwarestr = str_split($softwarestr, strlen($softwarestr)-2)[0];
	$softwarestr .= ")";

	$query = $db->prepare("SELECT name, link
			FROM resources
			WHERE keyword IN " . $softwarestr . ";");

	$query->execute();

	if ($query->rowCount() == 0)
	{
		echo "We couldn't find any tips to suit your internet lifestyle!";
	}

	while($row = $query->fetch(PDO::FETCH_ASSOC))
	{
		echo "<a href='" . $row["link"] . "'>" . $row["name"] . "</a>";
		echo "<br>";
	}

	echo "<br>";
	echo "View our source code <a href='?source=true'>here</a>!";

?>
</center>

</body>
</html>
