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
            ini_set('display_errors','0');
            $connection = new mysqli('cis.luzerne.edu','ds0012','f5qGHTW7g4','ds0012');
            if ($connection->connect_error)
            {
                // Error has occurred.
                echo "<p>Sorry, an error has occurred.   We can't connect to the database.</p>";
                }
            else
            {
                // Query to retreive all records from the addresses table.
                $sql = "select * from addresses;";
                $query = $connection->query($sql);
                if ($query == false)
                {
                    echo "<p>Sorry, we were unable to retrieve addresses from database.</p>";
                }
                else
                {
                    // Query was successful.
                    echo "<p>We have $query->num_rows addresses in our database.</p>"; 
                    if ($query->num_rows == 0)
                    {
                        echo "<p>Sorry, there are no addresses to display.</p>";
                    }
                    else
                    {
                        // Display fields for each address record.  At the same time,
                        // build a delete link which can be used to delete that record
                        // from the database.
                        echo "<table>";
                        $address = $query->fetch_assoc();
                        while ($address != false)
                        {
                            echo "<tr><td>" . $address['studentid'] . "</td>";
                            echo "<td>" . $address['firstname'] . "</td>";
                            echo "<td>" . $address['lastname'] . "</td>";
                            echo "<td>" . $address['street'] . "</td>";
                            echo "<td>" . $address['city'] . "</td>";
                            echo "<td>" . $address['state'] . "</td>";
                            echo "<td>" . $address['zip'] . "</td>";
                            echo "<td><a href=\"delete.php?studentid=" . $address['studentid'] . "\">Delete</a></td></tr>";
                            $address = $query->fetch_assoc();
                        }
                       
                        echo "</table>";
                    }
                    $query->free();
                }
                $connection->close();
            }
        ?>
        
        <!-- This is the link for the add new address to the database -->
        <p><a href="addnew.php">Add a new address</a></p>
    </body>
</html>
