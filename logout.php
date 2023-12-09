<?php
    unset($_SESSION['authenticatedUser']);
    echo("Logout Successful");
    header("Location: home.php");
    exit();
?>