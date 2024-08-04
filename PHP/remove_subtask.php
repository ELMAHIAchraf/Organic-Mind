<?php
    session_start();

    include('connexion.php');
        if(isset($_POST['id_subtask']) and !empty($_POST['id_subtask'])){

                $id_subtask=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['id_subtask'])));

                $sql2="SELECT id_task FROM subtasks WHERE id_subtask=$id_subtask";
                $query2=mysqli_query($conn, $sql2);
                $tab2=mysqli_fetch_row($query2);

                $sql="DELETE FROM subtasks WHERE id_subtask=$id_subtask";
                if(mysqli_query($conn, $sql)){
                    echo $tab2[0];
                }else{
                    echo "Error:".mysqli_error($conn);
                }
        }
?>