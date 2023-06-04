<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="upcoming" class="mainDiv">

<h1 class="todayTitle">Upcoming</h1>
<span  id="upcomingCount">
<?php
     echo $tab7['taskCount'];
?>
</span>

<div id="upcomingContainer"> 
    <div class="upcomingDivs">         
    <h1 class="subTitle">Tomorrow</h1>
    <div id="addTask">
            <?php $date=date("Y-m-d", time()+24*3600); ?>
        <div class="sub-addTask" onclick='displayTaskForm("tomorrowTasksCont;thisWeekTasksCont;", "<?php echo $date ?>", "<?php echo $date ?>")'>
            <i class="fa-solid fa-plus icones noMIcon"></i>
            <span class="text noMtext">Add New Task</span>
        </div>
    </div>

    <div id="tomorrowTasksCont">
        <?php
            $date=date("Y-m-d", time()+24*3600);
             $sql8="SELECT * FROM tasks NATURAL JOIN lists WHERE id_user=1 AND due_date='$date'";
             $query8=mysqli_query($conn, $sql8);
             while($tab8=mysqli_fetch_assoc($query8)){
                 $sql4="SELECT count(id_task) as subtaskCount FROM subtasks WHERE id_task={$tab8['id_task']}";
                 $query4=mysqli_query($conn, $sql4);
                 $tab4=mysqli_fetch_row($query4);
 
                 $date=date_create("{$tab8['due_date']}");
                 $date=date_format($date,"y-m-d");
                 echo "
                 <div class='tasks cl{$tab8['id_task']}' id='{$tab8['id_task']}'  onclick=\"controlTasksMenu('open', this.id)\">
                     <div class='tasks2'>
                         <span class='text noMtext tasksName' id='taskName{$tab8['id_task']}'>{$tab8['name_task']}</span>
                         <i class='fa-solid fa-angle-up fa-rotate-90 rightCarret'></i>
                     </div>
                     
                     <div class='infoDiv FinfoDiv'>
                         <div class='infoDiv'></div>
                             <i class='fa-solid fa-calendar-xmark icones'></i>
                             <span class='subInfo' id='taskDate{$tab8['id_task']}'>$date</span>
                         </div>
                         <div class='infoDiv'>
                             <span class='subInfo count fix subCounts{$tab8['id_task']}' id='subCount{$tab8['id_task']}'>$tab4[0]</span>
                             <span class='subInfo'>Subtasks</span>
                         </div>
                         <div class='infoDiv LinfoDiv'>
                             <div class='colors' id='taskListColor{$tab8['id_task']}' style='background-color:{$tab8['color_list']};'></div>
                             <span class='subInfo' id='taskListName{$tab8['id_task']}'>{$tab8['name_list']}</span>
                     </div>
                 </div>
                 ";
              }
        ?>
    </div>
    </div>
        <div class="upcomingDivs">         
        <h1 class="subTitle">This Week</h1>

        <div id="addTask">
                <?php 
                    $date=date("Y-m-d", time()+48*3600); 
                    $lastDayInTheWeekend=date("Y-m-d", strtotime("next Sunday")) ;   
                ?>
            <div class="sub-addTask" onclick='displayTaskForm("thisWeekTasksCont;", "<?php echo $date ?>", "<?php echo $lastDayInTheWeekend ?>")' >
                <i class="fa-solid fa-plus icones noMIcon"></i>
                <span class="text noMtext">Add New Task</span>
            </div>
        </div>

        <div id="thisWeekTasksCont" >
        
        <?php
                $date=date("Y-m-d", time()+24*3600);
                $LastDayOfTheWeek=date("Y-m-d", strtotime("next Sunday"));
                $sql9="SELECT * FROM tasks NATURAL JOIN lists WHERE id_user=1 AND (due_date BETWEEN '$date' AND '$LastDayOfTheWeek')";
                $query9=mysqli_query($conn, $sql9);
                while($tab9=mysqli_fetch_assoc($query9)){
                    $sql4="SELECT count(id_task) as subtaskCount FROM subtasks WHERE id_task={$tab9['id_task']}";
                    $query4=mysqli_query($conn, $sql4);
                    $tab4=mysqli_fetch_row($query4);
    
                    $date=date_create("{$tab9['due_date']}");
                    $date=date_format($date,"y-m-d");
                    echo "
                    <div class='tasks cl{$tab9['id_task']}' id='{$tab9['id_task']}'  onclick=\"controlTasksMenu('open', this.id)\">
                        <div class='tasks2'>
                            <span class='text noMtext tasksName' id='taskName{$tab9['id_task']}'>{$tab9['name_task']}</span>
                            <i class='fa-solid fa-angle-up fa-rotate-90 rightCarret'></i>
                        </div>
                        
                        <div class='infoDiv FinfoDiv'>
                            <div class='infoDiv'></div>
                                <i class='fa-solid fa-calendar-xmark icones'></i>
                                <span class='subInfo' id='taskDate{$tab9['id_task']}'>$date</span>
                            </div>
                            <div class='infoDiv'>
                                <span class='subInfo count fix subCounts{$tab9['id_task']}' id='subCount{$tab9['id_task']}'>$tab4[0]</span>
                                <span class='subInfo'>Subtasks</span>
                            </div>
                            <div class='infoDiv LinfoDiv'>
                                <div class='colors' id='taskListColor{$tab9['id_task']}' style='background-color:{$tab9['color_list']};'></div>
                                <span class='subInfo' id='taskListName{$tab9['id_task']}'>{$tab9['name_list']}</span>
                        </div>
                    </div>
                    ";
                 }  
            ?>
              
                      
            </div>
        </div>
</div>  
</div>
</body>
</html>