<?php
    session_start();

    include('connexion.php');

        if(isset($_POST['name']) and !empty($_POST['name']) &&
            isset($_POST['id_task']) and !empty($_POST['id_task'])){

                $name=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['name'])));
                $id_task=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['id_task'])));

                $sql="INSERT INTO subtasks VALUES('', $id_task, '$name')";
                if(mysqli_query($conn, $sql)){
                    $id_subtask=mysqli_insert_id($conn);
                    $tab=array("name"=>$name, "id_subtask"=>$id_subtask, "id_task"=>$id_task);
                    echo json_encode($tab);
                }else{
                    echo "Error:".mysqli_error($conn);
                }
           }
?>