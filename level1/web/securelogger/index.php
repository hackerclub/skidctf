<head>
  <title> SECURE LOGGER -- DEMO </title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <style>
    #lock
    {
      width: 5%;
      height: 7%;
      float: right;
      margin-top: -50px;
    }
  </style>
</head>
<html>
<h1> Welcome to SECURE LOGGER </h1> <img id="lock" src="lock.png">
<p> Tired of being five steps behind the hackers? Fortunately for you, the talented profressionals at CodeGarden incorporated have a solution! </p>

<hr>
<?php

session_start();

if (!isset($_SESSION['file']))
{
  $filename =  tempnam("tmp", "log");
  $_SESSION['file'] = str_replace($_SERVER['DOCUMENT_ROOT'] . '/', '', $filename);

}

$PAGES = array($_SESSION['file']);

if (isset($_GET['page']) && in_array($_GET['page'], $PAGES))
{
  require_once $_GET['page'];
}
else
{
  include "login-logger.php";
    
  echo '<br>';
  echo '<a class="btn btn-success" href="?page=' . $_SESSION['file'] . '">View Logs</a>';
}
?>
<hr>


<div class="alert alert-danger">
<h4> WARNING </h4>
<p> This solution is not cheap, but it will allow you to put hackers behind bars. </p>
</div>
<a href="/">Secure LOGGER Home</a> 
</body>

