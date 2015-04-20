<?php
	mysql_connect('localhost', 'squealy', 'CHANGEME');
	mysql_select_db('squealy');

	error_reporting(1);

	try
	{
		$db = new PDO('mysql:dbname=squealy;host=localhost', 'squealy', 'CHANGEME');
	} catch (PDOException $e)
	{
		echo 'Connection failed: ' . $e->getMessage();
	}

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
