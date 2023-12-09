<!DOCTYPE html>
    <html>
        <head>
            <title>Products</title>
            <link   rel="stylesheet"
                    type="text/css"
                    href="allprod.css">
            <h1>The Collection</h1>
        </head>

        <body>
            <div class= "container">
                <form method="get action= allprod.php">
                    <input type="text" name="search" placeholder="Search by name">
                    <input type="submit" value="Search">
                    <input type="reset" value="Reset">
                </form>
                
                <?php
                    include "db.php";
                    
                    $name= isset($_GET['name']) ? $_GET['name']:"";

                    if($name==$_GET['name']){
                        echo "<h2>Products containing ". $name ."</h2>";
                        $hasParameter = true;
                        $sql = "SELECT productId, productName, productPrice FROM Product WHERE productName LIKE ?";
                        $name = '%' . $name . '%';
                    }else{
                        echo "<h2>All Products</h2>";
		                $sql = "SELECT productId, productName, productPrice FROM Product";
                    }
                    

                    //search result
                    if($hasParameter){
                        $stmt= mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "s");
                        mysqli_stmt_execute($stmt);

                        $ouput= mysqli_stmt_get_result($stmt);
                    }else{
                        $result= mysqli_query($conn, $sql);
                    }

                    if(mysqli_num_rows($output)>0){
                        echo "<table><tr><th>Product ID</th><th>Product Name</th><th>Product Price</th></tr>";
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>".$row["id"]."</td><td>".$row["productName"]."</td><td>".$row["productPrice"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results";
                    }
                    
                ?>
            </div>
        </body>
    </html>
