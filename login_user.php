<?php
    session_start();
    include("connexion.php");
        if(isset($_POST['email']) && !empty($_POST['email']) and
            isset($_POST['pwd']) && !empty($_POST['pwd'])){
                $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $email=filter_var($email, FILTER_VALIDATE_EMAIL);
                $pwd=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['pwd'])));
                $sql="SELECT * FROM users WHERE email='$email'";
                $query=mysqli_query($conn, $sql);
                $tab=mysqli_fetch_assoc($query);
                    if(password_verify($pwd, $tab['password'])){
                        $_SESSION['id_user']=$tab['id_user'];
                        echo 1;
                    }else{
                        echo 0;
                    }
        }
?>