<?php
require ('login.inc.php'); ?>

<?php
require ('header.php'); ?>

        <h1>Estimate</h2>
        <h2>Making time prediction easy</h2>
        <ol>
            <li>Import data on how long it takes you to
            finish certain types of projects</li>
            <li>Use that data to guide your time predic -
            tions for similar future projects</li></ol>
            <form id="frmLogin" action="<?php
                echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
                <p>Email: <input type="text" name="txtUserName" maxlength="20" /></p>
                <p>Password:  <input type="password" name="txtPassword" maxlength="10" /></p>
                <p class="error"><?php
                echo $loginError ?></p>
                <input type="submit" value="Login" />
            </form>
            <a href="signup">signup</a>

<?php
require ('footer.php'); ?>