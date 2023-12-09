<?php
    session_start();

    $admin= isset($_SESSION['admin']) ? true:false;

    if(!$admin){
        //redirect to homepage
        $sendhome= "You are not an authorized user".$_SERVER['REQUEST_URI'];
        $_SESSION['loginMessage']= $sendhome;

        header('Location: home.php');
        exit;
    }
?>