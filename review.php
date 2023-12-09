<?php
    include "db.php";
    include "authorized.php";

    $userid = $_SESSION["authenticatedUser"];

    if(!isset($_GET['reviewRating']) || !isset($_GET['productId'])){
        header("Location: product.php");
    }
    $reviewrating = $_GET['reviewRating'];
    $producttd = $_GET['productId'];

    $comment= "";

    if(isset($_GET['reviewComment'])){
        $comment= $_GET['reviewComment'];
    }

    $stmt= mysqli_prepare($conn, "select id from customer c where userid=? and id not in (select id from review where pid=?)");
    mysqli_stmt_bind_param($stmt,"ss", $userid, $productid);
    $output= mysqli_stmt_get_result($stmt);

    if($row= mysqli_fetch_assoc($output)){
        $cid= $row['cid'];

        $sql= mysqli_prepare($conn, "insert into review(rating, cid, pid, review");
        mysqli_stmt_bind_param($sql, "siis", $reviewrating, $cid, $productid, $comment);
    }
    
?>