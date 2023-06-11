<?php
    session_start();
    include('connexion.php');

        if(isset($_POST['name']) and !empty($_POST['name']) &&
           isset($_POST['description']) and !empty($_POST['description']) &&
           isset($_POST['color']) and !empty($_POST['color'])){

                $name=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['name'])));
                $description=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['description'])));
                $color=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['color'])));

                $sql="INSERT INTO stickies VALUES('', 1, '$name', '$description', '$color')";
                if(mysqli_query($conn, $sql)){
                    $id_sticky=mysqli_insert_id($conn);
                    $tab=array("name"=>$name, "description"=>$description, "color"=>$color, "id_sticky"=>$id_sticky);
                    echo json_encode($tab);
                }else{
                    echo "Error:".mysqli_error($conn);
                }

           }
?>