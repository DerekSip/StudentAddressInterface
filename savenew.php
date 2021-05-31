<!DOCTYPE html>
<!-- 
Description: This part of the program enters the information into the address table using a insert
             SQL statement.
Name: Derek Siperko
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            ini_set('display_errors','0');
            $connection = new mysqli('cis.luzerne.edu','ds0012','f5qGHTW7g4','ds0012');
            if ($connection->connect_error)
            {
                // Error has occurred.
                echo "<p>Sorry, an error has occurred.   We can't connect to the database.</p>";
                //echo "<p>Error is $connection->connect_error</p>";
            }
            else
            {
                $sql = "insert into addresses (studentid,firstname,lastname,street,city,state,zip) "
                        . "values (" . $_POST['studentid'] . ",'" . 
                        $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['street'] .
                        "','" . $_POST['city'] . "','" . $_POST['state'] . "','" . $_POST['zip'] . "');";
                echo "SQL statement is $sql<br/>";
                $connection->query($sql);
                echo "<p>Your address has been saved!</p>";
                echo "<p><a href=\"main.php\">Return to address list</a></p>";
            }
            $connection->close();
        ?>
    </body>
</html>
