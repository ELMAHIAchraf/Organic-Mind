<?php
    include('connexion.php');
        if(isset($_POST['id_task']) and !empty($_POST['id_task'])){

                $id_task=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['id_task'])));

                $sql2="SELECT id_list FROM tasks WHERE id_task=$id_task";
                $query2=mysqli_query($conn, $sql2);
                $tab2=mysqli_fetch_row($query2);
                
                $sql="DELETE FROM subtasks WHERE id_task=$id_task";
                if(mysqli_query($conn, $sql)){
                    $sql="DELETE FROM tasks WHERE id_task=$id_task";
                    if(mysqli_query($conn, $sql)){
                        echo $tab2[0];
                    }
                }else{
                    echo "Error:".mysqli_error($conn);
                }
        }
?>