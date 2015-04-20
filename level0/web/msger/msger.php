<html>
<head>
<title>kiddie | web | msger</title>
</head>
<body>
	Send the admin a message. If you say something nice, maybe he'll
give you a flag.
	<form method="POST">
		<textarea rows="5" cols="50" name="mesg">
		</textarea>
		<br>
		<input type="submit" value="Send!">
	</form>

	<?php
		if (isset($_POST['mesg']))
		{
			$mesgf = tempnam('tmp', 'mesg-');	
			unlink($mesgf);
			$mesgf .= '.html';
			chmod($mesgf, 0644);
			file_put_contents($mesgf, $_POST['mesg'], FILE_APPEND);


			$base = $_SERVER['DOCUMENT_ROOT'];
			$link = str_replace($base . '/', '', $mesgf);
			echo "The admin will read the following ";
			echo "<a href='/" . $link . "'>message</a>";
			echo " shortly.";

			echo "<br>";
			$ret = popen("/usr/bin/phantomjs /srv/http/ctf/chals/xss.js $link 2>/dev/null", "r");
		}
	?>
</body>
</html>
