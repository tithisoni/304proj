<!--might not use-->
<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
    </head>
    <style>
        body{
            background-color: #f3f3e4;
        }
        header, nav, main, footer{
            background-color: #3b4a17;
        }
        table{
            border-collapse: collapse;
        }
        th, td{
            text-align: left;
        }
        th{
            background-color: #5b6b29;
        }
        footer{
            background-color: #3b4a17;
            margin-top: 345px;
            color: #000;
            max-width: 250px;
        }
    </style>
    <body>
        <header>
            <h1><?php   session_start();
                        $user= $_SESSION['customer'];
                        echo($user['name']);?> Shopping Cart</h1>
        </header>
        <nav>
            <ul>
                <li><a href=""</li> <!--add homepage-->
                <li><a href="allprod.php">Products</a></li>
                <li><a href= mailto:tithi2k3@gmail.com>Contact Us</a></li>
                <li><a href= "cart.php">Shopping Cart</a></li><!-- add shop.php-->
            </ul>
        </nav>
        <main>
            <section>
                <table>
                    <tr>
                        <th>Product Name</th><th>Quantity</th><th>Price</th><th>Total</th>
                    </tr>
                    <?php
                        include "db.php";
                        $total= 0;
                        
                        foreach($_SESSION['cart'] as $prodid=> $quantity){
                            $stmt= "select * from products where id= $prodid";
                            $output= mysqli_query($conn, $stmt);

                            //get name, quantity, price, and cost for each item
                            if($output->num_rows>0){
                                $row= $output->fetch_array();
                                $name= $row['name'];
                                $price= $row['price'];
                                $itemcost= $quantity*$price;
                                $total+=$itemcost;
                                //display cart info
                                echo("<tr>");
                                echo("<td>$name</td>");
                                echo("<td>$quantity</td>");
                                echo("<td>$price $</td>");
                                echo("<td>$itemcost $</td>");
                                echo("</tr>");
                            }
                        }
                        //display final cost
                        echo("<tr>");
                        echo("<td colspan='3'>Total:</td>");
                        echo("<td>$total $</td>");
                        echo("</tr>");
                    ?>
                </table>
                <form action= "checkout.php" method="post">
                    <input  type="submit"
                            value="Checkout"
                            class="button"/>
                </form>
            </section>
        </main>
    </body>
</html>