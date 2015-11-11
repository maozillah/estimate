<?php require('scripts/protectedPage.inc.php'); ?>   
<?php require('scripts/select_projectType.inc.php'); ?>   
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
<form id='gallerySelection' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
	Project Title:<input type="text" name="projTitle" />
	<?php echo $nameErr;?>
	<br />
    <select name="projectType">
          <option value="0">all project types</option><?php echo $typeErr;?>
          <?php echo GetProjecTypesList(); ?> 
     </select>
     <select name="projectScope">
          <option value="0">all project scope</option><?php echo $scopeErr;?>
          <?php echo GetScopeList(); ?> 
     </select>
     <br />
     Project Description:
	<br />
     <textarea name="projDescr" rows="5" cols="40"></textarea>
     <h2>Total time</h2>
     Estimated time:<input type="time" name="estTime" />
     <br />
     Actual time:<input type="time" name="actTime" />
	<br />
     <input type="submit" id="btnSubmit" value="upload" />
</form>

<hr />
<p><a href="index.php?logout">Logout</a>

</body>
</html>