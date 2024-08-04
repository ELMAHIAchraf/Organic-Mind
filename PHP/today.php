<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <div id="today" class="mainDiv" >
        <h1 class="todayTitle">Today</h1>
        <span  id="todayCount">
            <?php
                $current_date=date('Y-m-d');
                 $sql5="SELECT count(id_task) AS tasksCount FROM tasks NATURAL JOIN lists WHERE id_user={$_SESSION['id_user']} AND DATE(due_date)='$current_date'";
                 $query5=mysqli_query($conn, $sql5);
                 $tab5=mysqli_fetch_assoc($query5);
                 if(!empty($tab5)){
                    echo $tab5['tasksCount'];
                 }else{
                    echo 0;
                 }
            ?>
        </span>
            <?php $date=date("Y-m-d"); ?>
        <div id="addTask">
            <div class="sub-addTask" onclick='displayTaskForm("tasksCont;", "<?php echo $date ?>", "<?php echo $date ?>")'>
                <i class="fa-solid fa-plus icones noMIcon"></i>
                <span class="text noMtext">Add New Task</span>
            </div>
        </div>
        <script>
        function updateToday(){
            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        let data=JSON.parse(xhr.responseText);
                            document.getElementById('tasksCont').innerHTML="";
                        for(let i=0; i < data.length;i++){
                        document.getElementById('tasksCont').innerHTML+=`
                        <div class='tasks cl${data[i].id_task}' id='${data[i].id_task}'  onclick=\"controlTasksMenu('open', this.id)\">
                            <div class='tasks2'>
                                <span class='text noMtext tasksName' id='taskName${data[i].id_task}'>${data[i].name_task}</span>
                                <i class='fa-solid fa-angle-up fa-rotate-90 rightCarret'></i>
                            </div>
                            
                            <div class='infoDiv FinfoDiv'>
                                <div class='infoDiv'></div>
                                    <i class='fa-solid fa-calendar-xmark icones'></i>
                                    <span class='subInfo taskDate${data[i].id_task}' id='taskDate${data[i].id_task}'>${data[i].date}</span>
                                </div>
                                <div class='infoDiv'>
                                    <span class='subInfo count fix subCounts${data[i].id_task}' id='subCount${data[i].id_task}'>${data[i].subtaskCount}</span>
                                    <span class='subInfo'>Subtasks</span>
                                </div>
                                <div class='infoDiv LinfoDiv'>
                                    <div class='colors' id='taskListColor${data[i].id_task}' style='background-color:${data[i].color_list};'></div>
                                    <span class='subInfo' id='taskListName${data[i].id_task}'>${data[i].name_list}</span>
                                </div>
                        </div>
                        `;
                        }
                        document.getElementById('todayCount').innerHTML=data.length
                        document.getElementById('todayCountTask').innerHTML=data.length
                    }
                }
            }
            xhr.open('POST', 'update_today.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send();
        }
    </script>
        <div id="tasksCont">
        <?php
            $sql3="SELECT * FROM tasks NATURAL JOIN lists WHERE id_user={$_SESSION['id_user']} AND DATE(due_date)='$current_date'";
            $query3=mysqli_query($conn, $sql3);
            while($tab3=mysqli_fetch_assoc($query3)){
                $sql4="SELECT count(id_task) as subtaskCount FROM subtasks WHERE id_task={$tab3['id_task']}";
                $query4=mysqli_query($conn, $sql4);
                $tab4=mysqli_fetch_row($query4);

                $date=date_create("{$tab3['due_date']}");
                $date=date_format($date,"y-m-d");
                echo "
                <div class='tasks cl{$tab3['id_task']}' id='{$tab3['id_task']}' onclick=\"controlTasksMenu('open', this.id)\">
                    <div class='tasks2'>
                        <span class='text noMtext tasksName' id='taskName{$tab3['id_task']}'>{$tab3['name_task']}</span>
                        <i class='fa-solid fa-angle-up fa-rotate-90 rightCarret'></i>
                    </div>
                    
                    <div class='infoDiv FinfoDiv'>
                        <div class='infoDiv'></div>
                            <i class='fa-solid fa-calendar-xmark icones'></i>
                            <span class='subInfo taskDate{$tab3['id_task']}' id='taskDate{$tab3['id_task']}'>$date</span>
                        </div>
                        <div class='infoDiv'>
                            <span class='subInfo count fix subCounts{$tab3['id_task']}' id='subCount{$tab3['id_task']}'>$tab4[0]</span>
                            <span class='subInfo'>Subtasks</span>
                        </div>
                        <div class='infoDiv LinfoDiv'>
                            <div class='colors' id='taskListColor{$tab3['id_task']}' style='background-color:{$tab3['color_list']};'></div>
                            <span class='subInfo' id='taskListName{$tab3['id_task']}'>{$tab3['name_list']}</span>
                    </div>
                </div>
                ";
             }
        ?>
        </div>
           
    </div>
</body>
</html>