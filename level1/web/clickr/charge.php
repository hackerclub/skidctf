<?php
  if (!$_SESSION['employee'])
  {
    print("<span class='error'>Unauthorized</span>");
    die();
  }
?>

<form action="/?page=charge" method="POST">
  username: <input type="text" name="username">
  $: <input type="text" name="charge">
  <input type="Submit" value="Charge Customer">
</form>

<?php
  $username = $_POST['username'];
  $charge = $_POST['charge'];
  if (isset($username) && is_string($username))
  {
    if (isset($charge) && is_string($charge))
    {
      system("echo $username:$charge >> tmp/invoice.txt");
      print("The user will be charged at the end of the month.");
      print("Thank you!");
    }
  }
?>
