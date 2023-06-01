<?php
    include('connexion.php');

        if(isset($_POST['id_sticky']) and !empty($_POST['id_sticky'])){

                $id_sticky=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['id_sticky'])));

                $sql="DELETE FROM stickies WHERE id_sticky=$id_sticky";
                if(mysqli_query($conn, $sql)){
                    echo 1;
                }else{
                    echo 0; 
                }

           }
?>