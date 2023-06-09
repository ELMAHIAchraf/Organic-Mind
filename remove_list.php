<?php
    include('connexion.php');
        if(isset($_POST['id_list']) and !empty($_POST['id_list'])){

                $id_list=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['id_list'])));

                $task_ids=array();
                $sql="SELECT id_task FROM tasks WHERE id_list=$id_list";
                $query=mysqli_query($conn, $sql);
                while($tab=mysqli_fetch_row($query)){
                    $task_ids[]=$tab[0];
                }

                for($i=0; $i<count($task_ids); $i++){
                    $sql2="DELETE FROM subtasks WHERE id_task=$task_ids[$i]";
                    $query2=mysqli_query($conn, $sql2);
                }
                for($i=0; $i<count($task_ids); $i++){
                    $sql3="DELETE FROM tasks WHERE id_task=$task_ids[$i]";
                    $query3=mysqli_query($conn, $sql3);
                }
                $sql3="DELETE FROM lists WHERE id_list=$id_list";
                if(mysqli_query($conn, $sql3)){
                        echo 1;
                 
                }else{
                    echo "Error:".mysqli_error($conn);
                }
            }
?>