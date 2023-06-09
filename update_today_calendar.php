<?php
    include("connexion.php");

    date_default_timezone_set('Africa/Casablanca');
    $date=date("Y-m-d ");

    $data=array();

    for ($i=8; $i <= 24; $i++){

        $sql="SELECT * FROM tasks NATURAL JOIN lists WHERE due_date='$date $i:00:00'";
        $query=mysqli_query($conn, $sql);
        $tab=mysqli_fetch_assoc($query);
        if(!empty($tab)){
            $data[]=array("color_list"=>$tab['color_list'], "name_task"=>$tab['name_task']);
        }else{
            $data[]=0;
        }
    }
    echo json_encode($data);

?>