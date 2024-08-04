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
<span  id="upcomingCount">0</span>

<div id="upcomingContainer"> 
    <div id="firstRow">
    <div class="upcomingDivs">         
    <h1 class="subTitle">Tomorrow</h1>
    <div id="addTask">
            <?php $date=date("Y-m-d", time()+24*3600); ?>
        <div class="sub-addTask" onclick='displayTaskForm("tomorrowTasksCont;thisWeekTasksCont;laterTasksCont;", "<?php echo $date ?>", "<?php echo $date ?>")'>
            <i class="fa-solid fa-plus icones noMIcon"></i>
            <span class="text noMtext">Add New Task</span>
        </div>
    </div>
    <script>
        function updateTomorrow(){
            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        let data=JSON.parse(xhr.responseText);
                        document.getElementById('tomorrowTasksCont').innerHTML="";
                        for(let i=0; i < data.length;i++){
                        document.getElementById('tomorrowTasksCont').innerHTML+=`
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
                        
                    }
                }
            }
            xhr.open('POST', 'update_tomorrow.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send();
        }
    </script>

    <div id="tomorrowTasksCont">
        
    </div>


    </div>
        <div class="upcomingDivs">         
        <h1 class="subTitle">This Week</h1>

        <div id="addTask">
                <?php 
                    $date=date("Y-m-d", time()+48*3600); 
                    $lastDayInTheWeekend=date("Y-m-d", strtotime("next Sunday")) ;   
                ?>
            <div class="sub-addTask" onclick='displayTaskForm("thisWeekTasksCont;laterTasksCont;", "<?php echo $date ?>", "<?php echo $lastDayInTheWeekend ?>")' >
                <i class="fa-solid fa-plus icones noMIcon"></i>
                <span class="text noMtext">Add New Task</span>
            </div>
        </div>

        <script>
        function updateWeek(){
            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        let data=JSON.parse(xhr.responseText);
                        document.getElementById('thisWeekTasksCont').innerHTML="";
                        for(let i=0; i < data.length;i++){
                        document.getElementById('thisWeekTasksCont').innerHTML+=`
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
                        
                    }
                }
            }
            xhr.open('POST', 'update_week.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send();
        }
    </script>

        <div id="thisWeekTasksCont" >
              
                      
            </div>
        </div>
        </div>

        <div class="upcomingDivs" id="laterContainer">         
    <h1 class="subTitle">Later</h1>
    <div id="addTask">
        <?php  
            $firstDayOfTheWeek=date("Y-m-d", strtotime("next Sunday +1 day"));
            $lastDayInTheYear=date("Y-12-31");
        ?>
        <div class="sub-addTask" onclick='displayTaskForm("laterTasksCont;", "<?php echo $firstDayOfTheWeek ?>", "<?php echo "$lastDayInTheYear" ?>")'>
            <i class="fa-solid fa-plus icones noMIcon"></i>
            <span class="text noMtext">Add New Task</span>
        </div>
    </div>

    <script>
        function updateLater(){
            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        let data=JSON.parse(xhr.responseText);
                        document.getElementById('laterTasksCont').innerHTML="";
                        for(let i=0; i < data.length;i++){
                        document.getElementById('laterTasksCont').innerHTML+=`
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
                        document.getElementById('upcomingCount').innerHTML=data.length;
                        document.getElementById('upcomingCountTask').innerHTML=data.length;

                    }
                }

            }
            xhr.open('POST', 'update_later.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send();
        }
    </script>
   
    <div id="laterTasksCont">
       
    </div>
    </div>
</div>  
</div>
</body>
</html>