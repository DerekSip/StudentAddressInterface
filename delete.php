<!DOCTYPE html>
<!--
Description: This file is used to verify that the user wishes to delete a specific
             record from the database.

Name: Derek Siperko
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            // Get the student ID from the form.
            $studentid = $_GET['studentid'];
            $connection = new mysqli('cis.luzerne.edu','ds0012','f5qGHTW7g4','ds0012');
            if ($connection->connect_error)
            {
                // Error has occurred.
                echo "<p>Sorry, an error has occurred.   We can't connect to the database.</p>";
                //echo "<p>Error is $connection->connect_error</p>";
            }
            else
            {
                // Query to retrieve student information from the addresses table.
                $sql = "select firstname, lastname from addresses where studentid=$studentid;";
                $query = $connection->query($sql);
                if ($query == false)
                {
                    echo "<p>Sorry, we were unable to retrieve addresses from database.</p>";
                }
                else
                {
                    // Query was successful.
                    if ($query->num_rows == 0)
                    {
                        echo "<p>Sorry, there are no addresses to display.</p>";
                    }
                    else
                    {
                        // This section of the code shows the user what they are about to delete and asks for conformation.
                        $address = $query->fetch_assoc();
                        echo "<p>Are you sure you wish to delete " . $address['lastname'] . ", " .
                                $address['firstname'] . "?</p>";
                        echo "<form method=\"post\" action=\"deleteaddress.php?studentid=$studentid\">";
                        echo "<input type=\"submit\" name=\"action\" value=\"Yes\">";
                        echo "<input type=\"submit\" name=\"action\" value=\"No\">";
                        echo "</form>";
                    }
                    $query->free();
                }
                $connection->close();
            }
        ?>
    </body>
</html>
