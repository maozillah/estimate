<?php require('scripts/protectedPage.inc.php'); ?>   
<?php require('scripts/upload_project.inc.php'); ?>   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload project data</title>
</head>
<body>

<h1>upload project data</h1>

<!-- or to confirmation screen -->
<!-- <form id='gallerySelection' action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" >
<p>
    <select name="projectType">
          <option value="0">all project types</option>
          <?php echo GetProjecTypesList(); ?> 
     </select>
    
     <input type="submit" id="btnSubmit" value="Go" />
</p>
</form> -->

<hr />
<p><a href="index.php?logout">Logout</a>

</body>
</html>
