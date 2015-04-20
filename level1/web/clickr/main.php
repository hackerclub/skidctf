<?php

print "<div id='title'>Clickr</div>";
print "<div id='slogan'>eBusiness, eVolved</div>";

$extras = "";
if ($_SESSION['employee'])
{
  $extras = "<li><a href='?page=charge'><span>charge a customer</span></a></li>";
}

print("<div id='main-border'>");
print("<div id='menu'>");
print("<ul> 
    <li><a href='?page=home'><span>home</span></a></li>
    <li><a href='?page=try'><span>try</span></a></li>
    <li><a href='?page=about'><span>about</span></a></li>
    <li><a href='?page=login'><span>login</span></a></li>
    $extras
    </ul>
    ");
print("</div>");


print("<div id='page'>");
if (!is_null($page))
{
  $page .= '.php';
  $page = htmlentities($page);

  $included = include $page;
  if (!$included)
    print("Could not load $page. Please contact an administrator.");
} 
else
{
  include 'home.php';
}

print("</div>");
print("</div>");
?>
