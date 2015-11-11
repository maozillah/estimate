<?php require('scripts/protectedPage.inc.php'); ?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Projects</title>
</head>
<body>
<h2>projects</h2>
<?php require('scripts/show_projectType.inc.php'); ?> 
<div id="imgNav">
    <ul>
        <li id='gallerySelection'><a href='upload_project.php'>Upload project</a></li>
        <!-- <?php echo ( LoadImageTitle(0) ); ?> -->
    </ul>
</div>

<!-- <div id='galleryImage'>
    <img src='<?php echo( GetImageFilename() );?>' alt='<?php echo( GetImageFilename() );?>' />
</div> -->
</body>
</html>
