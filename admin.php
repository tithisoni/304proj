<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
    </head>
    <body>
        <div class="container">
            <h3 class="muted">Eden.co</h3>
        </div>
        <?php
        // include "authorized.php";
        // include "loginHeader.php";
        ?>
        <div class="container">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                            <li><a href="admin.php">Admin Page</a></li>
                            <li><a href="listorders.php">Orders</a></li>
                            <li><a href="listcustomers.php">Customers</a></li>
                            <li><a href="data.php">Manage Data</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php

            include "db.php";
            include "authorized.php";
            
            $adm= $_SESSION['admin'];

            //query
            $stmt= "select id, orderdate, cid, pid, price, quantity, sum(total) as totalamt, o.sid from ordersummary
                    group by orderdate
                    order by orderdate desc
                    Limit 10";
            $output= mysqli_query($conn, $stmt);
            echo("<h3>Latest Orders</h3>");
            echo("<table>");
            echo("<tr><th>Order Id</th><th>Order Date</th><th>Customer Id</th><th>Product Id</th><th>Price</th><th>Quantity<th>Total</th><th>Shipment Id</th></tr>");

            while($row= mysqli_fetch_assoc($output)){
                $oid= $row['id'];
                $odate= $row['orderdate'];
                $cid= $row['orderdate'];
                $pid= $row['orderdate'];
                $price= $row['orderdate'];
                $qty= $row['orderdate'];
                $total= $row['totalamt'];
                $sid= $row['orderdate'];

                echo('<tr><td>'.$oid.'</td><td>'.$odate.'</td><td>'.$cid.'</td><td>'.$pid.'</td><td>'.$price.'</td><td>'.$qty.'</td><td>'.$total.'</td><td>'.$sid.'</td><tr>');
            }
            echo('</table');
        ?>
    </body>
</html>