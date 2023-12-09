<html>                              
    <head>
        <title>Login:</title>
    </head>
        <body>
        <!--<a href="login.html">Login Main Page</a>-->
            <?php
                
                session_start();

                $authenticatedUser= validLogin();
                
                if($authenticatedUser != null){
                    header('Location: home.php');
                }else{
                    header('Location: login.php');
                }

                function validLogin(){
                    require "db.php";
                    $username = $_POST["username"]; 
                    $pwd = $_POST["password"];

                    if($username== null || $pwd== null || strlen($username)==0|| strlen($pwd)==0){
                        return null;
                    }
                    $stmt= mysqli_prepare($conn, "select id from customer where username= ? and pwd=?");
                    mysqli_stmt_bind_param($stmt, "ss", $username, $pwd);
                    mysqli_stmt_execute($stmt);
                    $output= mysqli_stmt_get_result($stmt);

                    if(mysqli_num_rows($output)==0){
                        exit("<p>Invalid Username or Password</p>");
                    }

                    while($row= mysqli_fetch_assoc($output)){
                        if($row['id']== 1){
                            $_SESSION['admin']= $row['id'];
                        }else{
                            $user= $username;
                        }
                       
                    }
                    if($user != null){
                        $_SESSION["loginMessage"] = null;
                        $_SESSION["authenticatedUser"] = $user;
                     }
                     else{
                         $_SESSION["loginMessage"] = "No connection possible.";
                    }
                }
            ?>
        </body>
</html>