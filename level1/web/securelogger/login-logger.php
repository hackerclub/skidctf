<h3> LOGIN LOGGER BETA 0.2a &copy; CodeGarden </h3>

<p> All attempts to login to this site are logged into a confidential file. This will make hackers think twice about trying to exploit a SQL Injection or XSS vulnerability on your site. Attempt to log in a few times then click 'view logs' below to see the CodeGarden magic at work. </p>

<form action="" method="post">
  Username: <input type="text" name="username" placeholder="' or 1=1; --">
  Password: <input type="password" name="password">
        <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php
  if (isset($_SESSION['file']))
  {
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $time = "<b>Time:</b> " . date("h:i D M jS o") . "<br>";
      $username = "<b>Username:</b> " . $_POST['username'] . "<br>";
      $password = "<b>Password:</b> " . $_POST['password'] . "<br>";
      $tail = "<br>"; 
      file_put_contents($_SESSION['file'], $time . $username . $password . $tail, FILE_APPEND);
      echo "<i>Attempt logged by SECURE LOGGER &copy; CodeGarden</i>";
    }
  }
?>

