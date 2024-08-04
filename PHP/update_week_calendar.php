<?php
    session_start();

    include("connexion.php");

    date_default_timezone_set('Africa/Casablanca');

    $firstDay=date("Y-m-d", strtotime("this week"));
    $lastDay=date("Y-m-d", strtotime("next week -1 day"));
    $start=date("d", strtotime($firstDay));
    $last=date("d", strtotime($lastDay));
    $dates=array();
    $data=array();

    for($j=$start; $j<=$last; $j++){
        $dates[]=date('Y')."-".date('m')."-".$j;
    }    

    for($j=0; $j<7; $j++){
        for ($i=8; $i <= 24; $i++){
            $sql="SELECT * FROM tasks NATURAL JOIN lists WHERE due_date='$dates[$j] $i:00:00' AND id_user='{$_SESSION['id_user']}'";
            $query=mysqli_query($conn, $sql);
            $tab=mysqli_fetch_assoc($query);
            if(!empty($tab)){
                $data[]=array("color_list"=>$tab['color_list'], "name_task"=>$tab['name_task']);
            }else{
                $data[]=array("color_list"=>"transparent", "name_task"=>"");
            }
        }
    }
    echo json_encode($data);

?>