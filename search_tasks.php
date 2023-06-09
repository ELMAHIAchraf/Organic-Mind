<?php
    include('connexion.php');

        if(isset($_POST['search']) and !empty($_POST['search'])){

                $search=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['search'])));
                $sql2="SELECT * FROM subtasks  NATURAL JOIN tasks WHERE name_task='$search' OR name_task LIKE '%$search' OR name_task LIKE '$search%' OR name_task LIKE '%$search%'";
                $query2=mysqli_query($conn, $sql2);

                if(mysqli_num_rows($query2)>0){
                    $sql="SELECT id_task, name_task, DATE(due_date), count(id_subtask), name_list, color_list FROM tasks NATURAL JOIN lists NATURAL JOIN subtasks WHERE id_user=1 AND (name_task='$search' OR name_task LIKE '%$search' OR name_task LIKE '$search%' OR name_task LIKE '%$search%')";

                }else{
                    $sql="SELECT id_task, name_task, DATE(due_date), name_list, color_list FROM tasks NATURAL JOIN lists WHERE id_user=1 AND (name_task='$search' OR name_task LIKE '%$search' OR name_task LIKE '$search%' OR name_task LIKE '%$search%')";
                }
                $wihichSql=$sql;
                $query=mysqli_query($conn, $sql);
                $tab2=array();
                while($tab=mysqli_fetch_row($query)){
                    $date=date_create($tab[2]);
                    $date=date_format($date,"y-m-d");
                    if($tab[0]!=null){
                        if($wihichSql=="SELECT id_task, name_task, DATE(due_date), count(id_subtask), name_list, color_list FROM tasks NATURAL JOIN lists NATURAL JOIN subtasks WHERE id_user=1 AND (name_task='$search' OR name_task LIKE '%$search' OR name_task LIKE '$search%' OR name_task LIKE '%$search%')"){
                            $tab2[]=array("id_task"=>$tab[0], "name_task"=>$tab[1], "due_date"=>$date, "subtaskCount"=>$tab[3], "name_list"=>$tab[4], "color_list"=>$tab[5]);
                        }else{
                            $tab2[]=array("id_task"=>$tab[0], "name_task"=>$tab[1], "due_date"=>$date,"subtaskCount"=>0, "name_list"=>$tab[3], "color_list"=>$tab[4]);
                        }
                    }
                }
                if(!empty($tab2)){
                    $tab2[]=array("taskCount"=>count($tab2));
                }
                
                echo json_encode($tab2);
        }
        
?>