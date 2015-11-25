<?php
require ('scripts/protectedPage.inc.php'); ?>
<?php
require ('scripts/select_projectType.inc.php'); ?>
<?php
require ('scripts/upload_project.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php require ('header.php'); ?>

        <h1>upload project data</h1>
        <!-- or to confirmation screen -->
        <form id='gallerySelection' action="<?php
            echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
            Project Title:<input type="text" name="projTitle" /><?php
            echo $nameErr; ?>
            <br />
            <select name="projectType" onchange="fetch_select(this.value);">
                <option value="0">all project types</option>
                <?php
                echo GetProjecTypesList(); ?>
            </select>
            <select name="projectScope" id="new_select">
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
            <input type="submit" id="btnSubmit" name="submit" value="upload" />
        </form>
        <hr />
        <p><a href="index.php?logout">Logout</a>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript">
            function fetch_select(val)
        {
        $.ajax({
            type: 'post',
            url: 'scope.php',
            data: {
            get_option:val
            },
            success: function (response) {
            document.getElementById("new_select").innerHTML=response;
            }
        });
        }
        </script>

<?php require ('footer.php'); ?>