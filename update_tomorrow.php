<?php
    include("connexion.php");
    $date=date("Y-m-d", time()+24*3600);
    $data=array();
     $sql="SELECT * FROM tasks NATURAL JOIN lists WHERE id_user=1 AND DATE(due_date)='$date'";
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
?>