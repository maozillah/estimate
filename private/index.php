<?php require('scripts/protectedPage.inc.php'); ?>   
<?php require('scripts/select_projectType.inc.php'); ?>   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Protected Area</title>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","projects_show.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<h1>Project Trends</h1>

<a href="upload_project.php">upload project</a>


<!-- <form id='gallerySelection' action="projects_show.php" method="get" > -->
<form>
<select name="projectType" onchange="showUser(this.value)">

  <option value="0">all project types</option>
  <?php echo GetProjecTypesList(); ?> 
</select>
</form>

<div id="txtHint"><b>Person info will be listed here...</b></div>

<hr />
<a href="index.php?logout">Logout</a>

</body>
</html>
