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

<form id='gallerySelection' action="projects_show.php" method="get" >
<p>
    <select name="projectType">
          <option value="0">all project types</option>
          <?php echo GetProjecTypesList(); ?> 
     </select>
    
     <input type="submit" id="btnSubmit" value="Go" />
</p>
</form>

<hr />
<p><a href="page2.php">Go to page 2</a></p>
<a href="index.php?logout">Logout</a>

</body>
</html>
