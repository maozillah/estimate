<?php require('scripts/protectedPage.inc.php'); ?>     
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Protected Area</title>
</head>
<body>

<h2>Welcome <?php echo GetUserName(); ?></h2>
<p>You should only see this if you entered a user name and password.</p>
<p>You have accessed: <?php echo GetPageCount(); ?> protected pages.
<hr />
<p><a href="page2.php">Go to page 2</a></p>
<p><a href="index.php?logout">Logout</a>
</body>
</html>
