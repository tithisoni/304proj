<!DOCTYPE html>
<html>
    <head>
        <link href="style.css"
                rel="stylesheet"
                type="text/css">
        <title>All Orders</title>
    </head>

    <body>
        <h1>Orders</h1>
        <?php
        include "db.php";
        include "admin.php";

        $stmt= mysqli_prepare($conn, "select id, orderdate, cid, pid, price, quantity, sum(total) as totalamt, o.sid from ordersummary group by orderdate order by orderdate desc");
        mysqli_stmt_execute($stmt);

        $output= mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($output) > 0) {
            echo "<table><tr><th>ID</th><th>Order Date</th><th>Customer ID</th><th>Total</th></tr>";
            while($row = mysqli_fetch_assoc($output)) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["orderdate"]."</td><td>".$row["cid"]."</td><td>".$row["total"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No Orders";
        }
        ?>
    </body>
</html>