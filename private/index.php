<?php require('scripts/protectedPage.inc.php'); ?>   
<?php require('scripts/select_projectType.inc.php'); ?>   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Protected Area</title>
</head>
<body>

<h1>Project Trends</h1>
<!-- <h2>Welcome <?php echo GetUserName(); ?></h2>
<p>You have accessed: <?php echo GetPageCount(); ?> protected pages.</p> -->

<form id='gallerySelection' action="projects_show.php" method="get" >
<p>
    <select name="galleryID">
          <option value="0">All project types</option>
          <?php echo GetProjecTypesList(); ?> 
     </select>
     <input type="submit" id="btnSubmit" value="Go" />
</p>
</form>

<hr />
<p><a href="page2.php">Go to page 2</a></p>
<p><a href="index.php?logout">Logout</a>

</body>
</html>
