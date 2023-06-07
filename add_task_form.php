<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #transparent-bgT{
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.736);
            position: fixed;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }
        #form-div{
            width: 30%;
            height: 480px;
            background-color: white;
            border-radius: 10px;
            background-color: #F1F1F1;
            display: flex;
            align-items: center;
        }
        #addStickyForm{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: -30px;
        }
        button, input, label, h1, textarea{
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            font-weight: bold;
        }
        #taskNameT{
            border: 1px solid #dbdbdb;
            border-radius: 8px;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 285px;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .inputs{
            width: 150px;
            background-color: transparent;
            border: none;
            outline: none;
            width: 90%;
        }
        #addButtonT{
            border: none;
            padding: 10px 30px;
            font-size: 16px;
            font-weight: bold;
            color: #484848;
            cursor: pointer;
            background-color: #ffd630;  
            border-radius: 6px;
            margin-top: 10px;
        }
        textarea{
            resize: none;
        }
        #taskDescT{
            border: 1px solid #dbdbdb;
            border-radius: 8px;
            width: 275px;
            height: 100px;
            padding-bottom: 10px;
            padding-top: 10px;
            padding-left: 10px;
            margin-top: 15px;
        }
        .metaInfoDivT{
            display: inline-block;
            padding: 4px 7px;
            border-radius: 5px;
            border: 1px solid #e1e1e1;
            margin-left: 20px;
            margin-bottom: 5px;
            width: 120px;

        }
        .metaInfoDivT1{
            margin-left: 55px;
            width: 100px;
        }
        .metaInfo{
            padding: 4px 7px;
            border-radius: 5px;
            background-color: transparent;
            outline: none;
            border: none;
            color: #828282;
            font-weight: bold;
            cursor: pointer;
        }
        .text{
            font-size: 14px;
            color: #545454;
        }   
        #listT{
            margin-left: -13px;
        }
        #dateT{
            margin-left: -8px;
            display: inline-block;
        } 
        #timeT{
            display: inline-block;
            margin-left: -13px;
        }
        #dateTime{
            margin-top: -10px;
        }

    </style>
</head>
<body>
    <div id="transparent-bgT" onclick="hideFormT()">
        <div id="form-div">
            <form id="addStickyForm">
                <h1>Task:</h1>
                <div id="taskNameT">
                    <input class="inputs" id="nameInputT"  type="text" placeholder="Name">
                </div>
                <div id="taskDescT">
                    <textarea id="descriptionInputT" class="inputs" placeholder="Description"></textarea>
                </div>
                <div id="listT">
                    <br><label class="text">List</label>
                    <div class="metaInfoDivT metaInfoDivT1">
                        <select class="metaInfo" id="listInputT">
                        <?php
                            include("connexion.php");
                            $sql="SELECT * FROM lists WHERE id_user=1";
                            $query=mysqli_query($conn, $sql);
                            while($tab=mysqli_fetch_assoc($query)){
                                echo "<option id='{$tab['name_list']}' value='{$tab['id_list']}'>{$tab['name_list']}</option>";
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div id="dateTime">
                    <div id="dateT">
                        <br><label class="text">Due date</label>
                        <div class="metaInfoDivT metaInfoDivT2"><input id="dateInputT" type="date" class="metaInfo"></div>
                    </div>
                    <div id="timeT">
                        <div class="metaInfoDivT metaInfoDivT2"><input id="timeInputT" value="<?php echo date("h:00:00") ?>" type="time" class="metaInfo"></div>
                    </div>
                </div>
                    <input type="hidden" id="containerId" value="tasksCont;">
                <button type="button" id="addButtonT" onclick="addTask()"><i class="fa-sharp fa-solid fa-plus"></i>&ensp;Add</button>
            </form>
        </div>
    </div>
    <script>
         function hideFormT(){
            if(event.target.id=='transparent-bgT'){
                document.getElementById('transparent-bgT').style.display="none";
            }
        }
        function addTask(){
            let name=document.getElementById('nameInputT').value;
            let description=document.getElementById('descriptionInputT').value;
            let list=document.getElementById('listInputT').value;
            let date=document.getElementById('dateInputT').value;
            let time=document.getElementById('timeInputT').value;
            let container=document.getElementById('containerId').value;
            container=container.substring(0, container.length-1);
            container=container.split(";");

            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    let task=JSON.parse(xhr.responseText);
                    // let index=document.getElementsByClassName('Subtask').length;
                    for(let i=0; i<container.length; i++){
                    document.getElementById(container[i]).innerHTML+=`
                        <div class='tasks cl${task.id_task}' id='${task.id_task}' onclick=\"controlTasksMenu('open', this.id)\">
                            <div class='tasks2'>
                                <span class='text noMtext tasksName' id='taskName${task.id_task}'>${task.name}</span>
                                <i class='fa-solid fa-angle-up fa-rotate-90 rightCarret'></i>
                            </div>
                            
                            <div class='infoDiv FinfoDiv'>
                                <div class='infoDiv'></div>
                                    <i class='fa-solid fa-calendar-xmark icones'></i>
                                    <span class='subInfo' id='taskDate${task.id_task}'>${task.date}</span>
                                </div>
                                <div class='infoDiv'>
                                    <span class='subInfo count fix subCounts${task.id_task}' id='subCount${task.id_task}'>0</span>
                                    <span class='subInfo'>Subtasks</span>
                                </div>
                                <div class='infoDiv LinfoDiv'>
                                    <div class='colors' id='taskListColor${task.id_task}' style='background-color:${task.color_list}'></div>
                                    <span class='subInfo' id='taskListName${task.id_task}'>${task.name_list}</span>
                                </div>
                        </div>
                        `;
                    }
                countName=container[0];
                if(countName=="tasksCont"){
                    let count=document.getElementById('todayCount').innerHTML;
                    count++;
                    document.getElementById('todayCount').innerHTML=count;

                    let countTask=document.getElementsByClassName('count')[1].innerHTML;
                    countTask++;
                    document.getElementsByClassName('count')[1].innerHTML=countTask;
                }else{
                    let count=document.getElementById('upcomingCount').innerHTML;
                    count++;
                    document.getElementById('upcomingCount').innerHTML=count;

                    let countTask=document.getElementsByClassName('count')[0].innerHTML;
                    countTask++;
                    document.getElementsByClassName('count')[0].innerHTML=countTask;
                }

                let countList=document.getElementById('listCount'+task.id_list).innerHTML;
                countList++;
                document.getElementById('listCount'+task.id_list).innerHTML=countList;
                }
            }
            xhr.open('POST', 'add_task.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('name='+name+'&description='+description+'&list='+list+'&date='+date+'&time='+time);
            document.getElementById('transparent-bgT').style.display='none';
        }
    </script>
</body>
</html>