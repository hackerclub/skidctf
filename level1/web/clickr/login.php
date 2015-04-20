<h4>Login to the Premium Clickr Experience</h4>

<form action="?page=login" method="POST">
  <div class=copy>Username:</div> <input type="text" name="username"><br>
  <div class="copy">Password:</div> <input type="password" name="password"><br>
  <input type="Submit" value="Login"> 
</form>

<?php
  if (isset($_POST['username']) && isset($_POST['password']))
  {
    print("</br>");
    print("Invalid credentials, please try again.");
  }
?>
