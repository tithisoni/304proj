<html>                              
    <head>
        <title>Register Below:</title>
    </head>
    <body>
    <a href="login.html">Login Main Page</a>
        <?php 
        //connect to db
        require "db.php";

            if ($_SERVER["REQUEST_METHOD"]== "POST"){                               
                $firstname= $_POST["firstname"];                                
                $lastname= $_POST["lastname"];                              
                $email= $_POST["email"];                                
                $username= $_POST["username"];                              
                $password= $_POST["password"];
                $address= $_POST['address'];                              
                $city= $_POST['city'];
                $state= $_POST['state'];  
                $country= $_POST['country'];
                $pc= $_POST['pc'];

                //encrypt pwd
                $hashedpwd= password_hash($password, PASSWORD_BCRYPT);
                
                //check if username already exists
                $checkuser= mysqli_prepare($conn, "select * from customer where username=?");
                mysqli_stmt_bind_param($checkuser, "s", $username);
                mysqli_stmt_execute($checkuser);
                $exists= mysqli_stmt_get_result($checkuser);

                if(mysqli_num_rows($exists)>0){
                    echo("Username is taken :(");
                }else{
                    //add user
                    $stmt= mysqli_prepare($conn, "insert into customer (firstname, lastname, email, username, pwd, address, city, state, country, postalcode) values (?,?,?,?,?,?,?,?,?,?)");
                    mysqli_stmt_bind_param($stmt, "ssssssssss", $firstname, $lastname, $email, $username, $password, $address, $city, $state, $country, $pc);
                    mysqli_stmt_execute($stmt);
                    echo("Account Created!");
                }
    
            }                               
        ?>  
    </body>                            
</html>                             
