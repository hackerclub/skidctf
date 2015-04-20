<html>
<head>
	<title> prefix </title>
	<style>
	input { width: 250px; }
	p { font-family: monospace }
	</style>
</head>
<body>

<center>
<pre>
<?php

$value = "";

	if (isset($_GET['prefix']))
	{
		$value=$_GET['prefix'];
	}

$form  = "<form method='GET'>";
$form .= "<input type='text' value='$value' name='prefix'>";
$form .= "</form>";

// your challenge is to leak this through the web interface!
define('FLAG', 'flag{ecb_strikes_again!}');

echo $form;

function encrypt($prefix)
{
	return mcrypt_encrypt(MCRYPT_RIJNDAEL_128,
			md5(FLAG),
			$prefix . FLAG,
			"ecb");
}

$riddle = bin2hex(encrypt($_GET['prefix']));
for ($i = 0; $i < strlen($riddle); $i = $i + 32)
{
	echo substr($riddle, $i, 32);
	echo "<br>";
}
?>

AES-128 
DECRYPT THIS
</pre>
</center>

</body>
</html>
