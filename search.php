<?php
    include "db.php";

    if(isset($_POST['product'])){
        $name= $_POST['product'];
        $stmt= "select name from product where name like %$name% limit 5";
        $output= mysqli_query($conn, $stmt);

        echo('<ul>');
        
        while($result= mysqli_fetch_array($output)){
            ?>
            <li onclick='fill("<?php echo $result["Name"]; ?>")'>
                <a><?php echo $result['name'];?>
            </li></a>
            <?php
        }
    }
?>
</ul>
