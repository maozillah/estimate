<?php
require ('scripts/protectedPage.inc.php'); ?>
<?php
require ('scripts/select_projectType.inc.php'); ?>
<?php
require ('header.php'); ?>
<h1>Project Trends</h1>

<!-- <form id='gallerySelection' action="projects_show.php" method="get" > -->
<form>
    <select name="projectType" onchange="showUser(this.value)">
        <option value="0">all project types</option>
        <?php
echo GetProjecTypesList(); ?>
    </select>
</form>
<div id="txtHint"></div>

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
        xmlhttp.open("GET", "projects_show.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

<?php
require ('footer.php'); ?>