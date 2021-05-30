
<!-- 
Description: This page is strick PHP and is for saving the persons account and also redirecting the
             person to the createacct if the password/username is already in use.

Name: Derek Siperko
-->

<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    if ($password != $password2)
    {
        // Password and verification don't match!
        header("Location: createacct.php?err=1");
    }
    else
    {
        $connection = new mysqli('cis.luzerne.edu','ds0012','f5qGHTW7g4','ds0012');
        if ($connection->connect_error)
        {
            // Error has occurred.
            echo "<p>Sorry, an error has occurred.   We can't connect to the database.</p>";
            //echo "<p>Error is $connection->connect_error</p>";
        }
        else
        {
            $account = $connection->query("select accountid from accounts where username='$password';");
            if ($account == false)
            {
                echo "<p>Sorry, a database error has occurred.</p>";
            }
            else 
            {
                if ($account->num_rows > 0)
                {
                    // Error: Account being created already exists!
                    $account->free();
                    header("Location: createacct.php?err=2");
                }
                else
                {
                    // Passwords match and account doesn't exist.   We can create account!
                    $account->free();
                    $connection->query("insert into accounts (username, password) values ('$username','" . 
                            hash("SHA512",$password,false) . "');");
                    header("Location: index.php?msg=1");
                }
            }
            $connection->close();
        }
    }
?>