<!DOCTYPE html>
<html>
    <head>
        <link   href="style.css"
                rel="stylesheet"
                type="text/css">
        <title>Customer Information</title>
    </head>

    <body>
        <?php

            include "db.php";
            include "authorized.php";

            $user= $_SESSION['authenticatedUser'];

            $stmt= mysqli_prepare($conn, "select id, firstname, lastname, email from customer where id= ?");
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $output= mysqli_stmt_get_result($stmt);

            $row= mysqli_fetch_assoc($output);

            if($row){
                echo "<h2>Customer Information</h2>";
                echo "<p>ID: " . $row['id'] . "</p>";
                echo "<p>First Name: " . $row['firstname'] . "</p>";
                echo "<p>Last Name: " . $row['lastname'] . "</p>";
                echo "<p>Email: " . $row['email'] . "</p>";
                } else {
                echo "<p>No customer information found for this user.</p>";
            }

        ?>
    </body>
</html>
<?php

?>