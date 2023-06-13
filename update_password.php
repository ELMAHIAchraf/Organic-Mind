<?php
    include("connexion.php");

    if(isset($_POST['token']) && !empty($_POST['token']) &&
        isset($_POST['password']) && !empty($_POST['password'])){             
            
        $token=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['token'])));
        $current_time=time();
        $sql="SELECT * FROM Tokens WHERE token='$token' and UNIX_TIMESTAMP(token_creation_time)-$current_time < 24*3600";
        $query=mysqli_query($conn, $sql);
        $tab=mysqli_fetch_assoc($query);
        if(!empty($tab)){   
                    $password=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['password'])));
                    $password=password_hash($password, PASSWORD_DEFAULT);
                    $sql2="UPDATE users SET password_user='$password' WHERE id_user={$tab['id_user']}";
                    if(mysqli_query($conn, $sql2)){
                        echo 1;
                    }else{
                        echo 2;
                    }
                
        }else{
            echo 3;
        }
    }
?>