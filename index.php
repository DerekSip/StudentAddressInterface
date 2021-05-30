<!DOCTYPE html>
<!--
Description: This is the initial login page for the student address database.

Name: Derek Siperko
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Student Address Login</title>
    </head>
    <body>
        <?php
        // This is where the user gets sent back to login if there user name/password was created or if it was incorrect.
        if (isset($_GET['msg']))
        {
            if($_GET['msg']=='1')
            {
                echo "<p>Your account has been created. please login.</p>";
            }
            else if($_GET['msg'] == '2')
            {
               echo "incorrect user/password";
            }
        }
        
        // Form used to have the user either enter a password that they made or to 
        // create a username or password.
        ?>
        <h3>Student Address Login </h3>
        <form method="post"action="login.php">
            username: <input type="text" name="username" maxlength="16" size="16"/><br/>
            password: <input type="password" name="password"/></</p>
        <p><input type="submit" value="Login"/></p>
        </form>        
        <p><a href="createacct.php">Create an account<a/><p/>
    </body>
</html>
