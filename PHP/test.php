<?php
    $date1="23-06-11";
    $date= "23-06-12";

    if($date==$date1){
        $remove=0;
    }else{
        if($date1==date("y-m-d", strtotime("+1 day"))){
            $remove=1;
        }else if($date1>date("y-m-d", strtotime("+1 day")) && $date1<=date("y-m-d", strtotime("next Sunday"))){
            $remove=2;
        }else if($date1>date("y-m-d", strtotime("next Sunday"))){
            $remove=3;
        }else {
            $remove=4;
        }       
    }
    echo $remove;
?>
