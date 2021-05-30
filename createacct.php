<!DOCTYPE html>
<!--
Description: This file displays a list of existing student addresses.  It also
             allows the user to add/delete addresses.

Name: Derek Siperko
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if (isset($_GET['err']))
            {
                if ($_GET['err'] == '1')
                {
                    echo "<p>Your password and verification don't match.  Try again.</p>";
                }
                else if ($_GET['err'] == '2')
                {
                    echo "<p>The username you've selected is already in use.   Try another.</p>";
                }
            }
        ?>
        <form method="post" action="saveacct.php">
            <p>Username: <input type="text" name="username" size="16" maxlength="16"/><br/>
               Password: <input type="password" name="password"/><br/>
               Password (again, for verification): <input type="password" name="password2"/></p>
            <p><input type="submit" value="Create Account"/></p>
        </form>
    </body>
</html>
