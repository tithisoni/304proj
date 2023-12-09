<!DOCTYPE html>
<html>
    <head>
        <link  href="style.css"
                rel="stylesheet"    
                type="text/css">
        <title>Home Page</title>
    </head>

    <body>
        <?php
            session_start();

            $user= isset($_SESSION['authenticatedUser']) ? $_SESSION['authenticatedUser'] : null;

        ?>
        <h2 align="center"><a href="login.php">Login</a>
            <a href="allprod.php">Begin Shopping</a>
            <a href="listorders.php">Orders</a>
            <a href="listcustomers.php">Customer Information</a>
            <a href="admin.php">Admin</a>
            <a href="logout.php"><button>Logout</button></a>
        </h2>

        <?php
            if($user != null){
                echo("<h3 align>Signed in as:".$user."</h3>");
            }
        ?>
    </body>
</html>