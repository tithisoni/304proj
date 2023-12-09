<?php
    session_start();

    $prodlist= isset($_SESSION['productList'])? $_SESSION['productList'] : array();

    //add new product and get its information
    $id= $_POST['id'];
    $name= $_POST['name'];
    $price= $_POST['price'];
    $quantity= 1;
    //store info
    $product= array($id, $name, $price, $quantity);
    if(array_key_exists($id, $prodlist)){
        $product= $prodlist[$id];
        $curramt= $product[3];
        $product[3]= $curramt+1;
    }else{
        $prodlist[$id]= $product;
    }
    $_SESSION['productlist']= $prodlist;
    //show cart
    header('Location: showcart.php');
?>