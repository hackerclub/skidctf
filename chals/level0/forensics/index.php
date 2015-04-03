<html>
<head>
	<title>kiddie | forensics</title>
    <link href="../../../css/style.css" rel="stylesheet">
</head>
<?php 
	require_once('../../../config/include.php');
?>

	<h2> forensics </h2>
	<hr>

	<?php
		$resources = array("shirekku.png" => "shirekku.png");
		echo generate_challdesc("shirekku", $resources, $db);
	?>
	<hr>

	<?php
		$resources = array("pakkits.pcap" => "pakkits.pcap");
		echo generate_challdesc("pakkits", $resources, $db);
	?>

	<hr>
	<?php
		$resources = array("seinmeld.jpg" => "seinmeld.jpg");
		echo generate_challdesc("seinmeld", $resources, $db);
	?>
	<hr>

	<i>resources:</i>
	<br>
	[+] <a href="http://www.libpng.org/pub/png/apps/pngcheck.html">pngcheck</a>
	<br>
	[+] <a href="https://en.wikipedia.org/wiki/Foremost_%28software%29">foremost</a>
	<br>
	[+] <a href="https://github.com/devttys0/binwalk">binwalk</a>
	<hr>


</html>
