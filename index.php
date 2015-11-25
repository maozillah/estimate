<?php
require ('login.inc.php'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>EstiMate: Time estimation helper</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

    <body>



<div class="container">
        <form id="frmLogin" action="<?php
            echo $_SERVER['SCRIPT_NAME']; ?>" method="post" class="form-signin">
			
			    <h1>Estimate</h2>
    <h4>Making time prediction easy</h4>
    <ol>
        <li>Import data on how long it takes you to
        finish certain types of projects</li>
        <li>Use that data to guide your time predictions for similar future projects</li></ol>

            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="txtUserName" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="txtPassword" class="form-control" placeholder="Password" required>

            <p class="error"><?php
            echo $loginError ?></p>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Sign in</button>
        </form>
    </div>
    <?php
    require ('footer.php'); ?>