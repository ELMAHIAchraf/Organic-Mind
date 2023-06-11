<?php
    session_start();

    include('connexion.php');

        if(isset($_POST['name_list']) and !empty($_POST['name_list'])){

                $name_list=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['name_list'])));

                $data=array();
                $sql="SELECT * FROM tasks NATURAL JOIN lists WHERE id_user='{$_SESSION['id_user']}' AND name_list='$name_list'";
                $query=mysqli_query($conn, $sql);
                while($tab=mysqli_fetch_assoc($query)){
                    $sql2="SELECT count(id_task) as subtaskCount FROM subtasks WHERE id_task={$tab['id_task']}";
                    $query2=mysqli_query($conn, $sql2);
                    $tab2=mysqli_fetch_row($query2);
                    
                    $date=date_create("{$tab['due_date']}");
                    $date=date_format($date,"y-m-d");

                    $data[]=array("id_task"=>$tab['id_task'],"subtaskCount"=> $tab2[0],"date"=>$date,"name_task"=>$tab['name_task'],"id_task"=>$tab['id_task'], "color_list"=>$tab['color_list'], "name_list"=>$tab['name_list']);
                } 
                echo json_encode($data);  
        }  
?>