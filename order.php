<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet"
            type="text/css"
            href="style.css">
        <title>Order</title>
    </head>
    <body>

        <?php
            require "db.php";
            require "authorized.php";
            session_start();
            $cid= $_GET["customerId"];
            $productList = $_SESSION["productList"];

            if ($custId == null || $custId == "")
                echo ("<h1>Invalid customer id.</h1>");
            else if($productList == null){
                echo "<h1>Your shopping cart is empty!</h1>";
            }
            $stmt= mysqli_prepare($conn, "SELECT id, firstName, lastName FROM Customer WHERE customerId = ?");
            mysqli_stmt_execute($stmt);
            $output= mysqli_stmt_get_result($stmt);

            $oid=0;
            if(mysqli_num_rows($output)==0){
                echo("<h1>Invalid customer id.  Go back and try again.</h1>");
            }else{
                $row= mysqli_fetch_assoc($output);
                $cname= $row['firstname']." ".$row['lastname'];

            
                $stmt= mysqli_prepare($conn, "INSERT INTO OrderSummary (customerId, totalAmount, orderDate) VALUES(?, 0, ?)");
                mysqli_stmt_bind_param($num, "is", date('Y-m-d H:i:s'));
                mysqli_stmt_execute($stmt);
                

                echo "<h1>Order Summary</h1>";
                echo "<table><tr><th>Product Id</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Subtotal</th></tr>";

                $total=0;
                foreach($productList as $prodid=> $product){
                    echo "<tr><td>".$productId."</td>";
                    echo "<td>".$product[1]."</td>";
                    echo "<td align=\"center\">".$product[3]."</td>";
                    $price = $product[2];
                    $qty = $product[3];
                    echo "<td align=\"right\">".number_format($price, 2)."</td>";
                    echo "<td align=\"right\">".number_format($price*$qty, 2)."</td></tr>";
                    $total = $total +$price*$qty;

                    $sql= mysqli_prepare($conn, "INSERT INTO OrderProduct (productId, quantity, price) VALUES (?, ?, ?, ?)");
                    mysqli_stmt_bind_param($sql, "idd", $product, $qty , $price);
                    mysqli_stmt_execute($sql);
                }
                echo "</table>";
            }
        
        ?>
</body>
</html>