<!DOCTYPE html>
<!--
Description: This file is used to verify a users login credentials.

Name: Derek Siperko
-->
<?php
    $connection = new mysqli('cis.luzerne.edu','ds0012','f5qGHTW7g4','ds0012');
    if ($connection->connect_error)
    {
        // Error has occurred.
        echo "<p>Sorry, an error has occurred.   We can't connect to the database.</p>";
        //echo "<p>Error is $connection->connect_error</p>";
    }
    else
    {
        // Validate username and password against records in the accounts table. 
        // NOTE that the password has to be run through the hash function to compare
        // against the encrypted value.
        $username = $_POST['username'];
        $password = $_POST['password'];
        $account = $connection->query("select accountid from accounts where username='$username' " .
                " and password='" . hash("SHA512",$password,false) . "'");
        if ($account == false)
        {
            echo "<p>Sorry, can't access database.</p>";
        }
        else
        {
            if ($account->num_rows > 0)
            {
                // Username and password is valid!  Open main.php.
                $account->free();
                header("Location: main.php");
            }
            else
            {
                // Username and/or password is invalid.  Back to index.php.
                $account->free();
                header("Location: index.php?msg=2");
            }
        }
        $connection->close();
    }
?>
