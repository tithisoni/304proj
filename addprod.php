<?php
    include ('authorized.php');
    
    if($_SESSION['admin'] !=1){
        header('Location: home.php');
    }

    if(!isset($_GET['pname']) || !isset($_GET['price'])|| !isset($_GET['cname'])){
        header("Location: data.php");
    }

    $pname= $_GET['pname'];
    $price= $_GET['price'];

    $desc= null;
    if(isset($_GET['$desc'])){
        $desc= $_GET['desc'];
    }

    include "db.php";
    //check category
    $cat= mysqli_prepare($conn, "select id from category where cname like ?");
    mysqli_stmt_bind_param($cat, "s", $cname);
    mysqli_stmt_execute($cat);
    $checkcat= mysqli_stmt_get_result($cat);
    if(!$checkcat){
        //if category does not exist, add it
        $sql= mysqli_prepare($conn,"insert into category(cname) values(?)");
        mysqli_stmt_bind_param($sql, "s", $pname, $price, $desc);
        mysqli_stmt_execute($sql);
    }

    $sql= mysqli_prepare($conn,"insert into product(name, price, description, cid) values(?,?,?,?)");
    mysqli_stmt_bind_param($sql, "sdss", $pname, $price, $desc);
    mysqli_stmt_execute($sql);
    $output= mysqli_stmt_get_result($sql);
    if(!$output){
        die('Ehhhhh. Something went wrong');
    }else{
    echo("<p>Product Added</p>");
    }
?>