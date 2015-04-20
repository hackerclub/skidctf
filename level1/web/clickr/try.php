<h4>Try Clickr</h4>
<p class='copy'> Have some faith in your involvement with Clickr. We provided 3 free clicks to demonstrate the efficiency of the Clickr staff on hand.

<?php
  if (!isset($_COOKIE['clicks']))
  {
    setcookie('clicks', 3);
  }

  if (isset($_POST['link']) && is_string($_POST['link']))
  {
    if (!filter_var($_POST['link'], FILTER_VALIDATE_URL))
    {
      print("<div class='error'>Invalid link submitted</div>");
    }
    else
    {
      $clickcnt = (int) $_COOKIE['clicks'];
      if (!($clickcnt < 1))
      {
        $_COOKIE['clicks'] = $clickcnt-1;
        setcookie('clicks', $_COOKIE['clicks']);

        $linkf = tempnam('tmp', 'link-');
        file_put_contents($linkf, $_POST['link'], FILE_APPEND);

        /* just sends a text to my mobile phone, no big deal */
        /* allows me click on the go, etc */
        system("config/alert-ceo.sh config/texttemplate $linkf");
      }
    }
  }

  $clickcnt = (int) $_COOKIE['clicks'];

  if (!isset($_COOKIE['clicks'])) /* exception for setting the cookie */
  {
    $clickcnt = 3;
  }

  if (($clickcnt > 0))
  {
    print("<div id='clickcnt'>");
    print("You have <span id='count'>$clickcnt</span> free clicks remaining.");
    print("</div>");

    print('<form action="/?page=try" method="POST">
            <input type="text" name="link" value="http://">
            <input type="Submit" value="clickr it.">
          </form>');
  }
  else
    print("Sorry, you have no free clicks remaining!");
?>
