<!--
Description: This file is used to delete the student record from the database.

Name: Derek Siperko
-->
<?php
    $studentid=$_GET['studentid'];
    $action=$_POST['action'];
    if ($action == "Yes")
    {
        //ini_set('display_errors','0');
        $connection = new mysqli('cis.luzerne.edu','ds0012','f5qGHTW7g4','ds0012');
        if ($connection->connect_error == false)
        {
            // Query to delete the student record from the database.
            $sql = "delete from addresses where studentid=$studentid;";
            $connection->query($sql);
            $connection->close();
        }
    }
    header("Location: main.php");
?>