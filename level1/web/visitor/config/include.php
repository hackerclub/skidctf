<?php
	mysql_connect('localhost', 'visitor', 'CHANGEME');
	mysql_select_db('visitor');

	error_reporting(1);

	try
	{
		$db = new PDO('mysql:dbname=visitor;host=localhost', 'visitor', 'CHANGEME');
	} catch (PDOException $e)
	{
		echo 'Connection failed: ' . $e->getMessage();
	}

?>
