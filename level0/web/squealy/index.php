<html>
<head>
  <title> kiddie | web | squealy </title>
</head>
<body>
  SQUEALY BANKS ATM BACKEND 
  <hr>
  <form method="POST">
    CCNUMBER : <input type="text" name="ccnumb">
    PIN: <input type="text" name="pin">
    <input type="submit" value="View Acct Info">
  </form>
  <hr>

    <?php
    require_once('config/include.php');

    if (isset($_POST['ccnumb']) && isset($_POST['pin']))
    {
      $ccnumb = $_POST['ccnumb'];
      $pin = $_POST['pin'];
      if ($pin !== "" && $ccnumb !== "")
      {

	      $query = $db->prepare("SELECT ccnumber, acct_extra
			FROM accts
			WHERE pin=" . $pin . " AND ccnumber=" . $ccnumb . ";");

	      try
	      {
		$query->execute();
	      } 
		catch (PDOException $e)
	      {
		echo $e->getMessage();
		echo "<hr>";
		die();
	      }

	      if ($query->rowCount())
	      {
		$row = $query->fetch(PDO::FETCH_ASSOC);
		echo 'CCNUMBER: ' . $row['ccnumber'] . "<br>";
		echo 'BALANCE:  ' . $row['acct_extra'];
		echo "<hr>";
	      }
	      else
	      {
		echo 'ERROR: unknown CCNUMBER and PIN combination';
		echo '<hr>';
	      }
       }
    }
    ?>


  Technicians, please use the special CCNUMBER 1337
  and the PIN number given in your employee manual to administer
  this machine.
  <hr>
</body>
</html>
