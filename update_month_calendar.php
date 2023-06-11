<?php
    session_start();

    include("connexion.php");

    $data=array();
    $day=date("Y-m-01");
    $date=new DateTime($day);
    $date->modify('last Monday');
    $firstdayOfFirstWeek=$date->format('Y-m-d');


    for($i=0; $i<35; $i++){
        $Date=date("d", strtotime("$firstdayOfFirstWeek +$i day"));
        $date=date("Y-m-$Date");

        $microData=array($Date);
        $sql="SELECT color_list FROM tasks NATURAL JOIN lists WHERE DATE(due_date)='$date' AND id_user='{$_SESSION['id_user']}' LIMIT 3";
        $query=mysqli_query($conn, $sql);
        $count=0;
        while($tab=mysqli_fetch_row($query)){
            $microData[]=$tab[0];
            $count++;
        }
        for($k=$count ;$k <3; $k++){
            $microData[]="transparent";
        }
        $data[]=$microData;
    }
     echo json_encode($data);

?>