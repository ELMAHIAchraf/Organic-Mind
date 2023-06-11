<?php
    session_start();
    include("connexion.php");
        if(isset($_POST['Fname']) && !empty($_POST['Fname']) and
            isset($_POST['Lname']) && !empty($_POST['Lname']) and
            isset($_POST['email']) && !empty($_POST['email']) and
            isset($_POST['pwd']) && !empty($_POST['pwd'])){  

            $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email=filter_var($email, FILTER_VALIDATE_EMAIL);

            $sql="SELECT * FROM users WHERE email='$email'";
            $query=mysqli_query($conn, $sql);
            $tab=mysqli_fetch_assoc($query);

            if(empty($tab)){
                $fname=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['Fname'])));
                $lname=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['Lname'])));
                $pwd=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['pwd'])));
                $pwd=password_hash($pwd, PASSWORD_DEFAULT);
                $sql2="INSERT INTO users VALUES('', '$fname', '$lname', '$email', '$pwd')";
                if(mysqli_query($conn, $sql2)){
                    echo 1;
                    $_SESSION['Fname']=$tab['Fname'];
                    $_SESSION['id']=$tab['id_user'];
                }else{
                    echo 0;
                }
            }else{
                echo 2;
                
            }
        } 
?>