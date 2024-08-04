<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <div id="searchMain" class="mainDiv" >
        <h1 class="todayTitle">Search results</h1>
        <span  id="searchCount">
            
        </span>
        <script>
        function seachTasks(){
            let search=document.getElementById('searchInput').value
            document.getElementById('listMain').style.display="none";
            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        
                        let data=JSON.parse(xhr.responseText);
                        document.getElementById('searchCont').innerHTML="";
                        for(let i=0; i < data.length-1;i++){
                        document.getElementById('searchCont').innerHTML+=`
                        <div class='tasks cl${data[i].id_task}' id='${data[i].id_task}'  onclick=\"controlTasksMenu('open', this.id)\">
                            <div class='tasks2'>
                                <span class='text noMtext tasksName' id='taskName${data[i].id_task}'>${data[i].name_task}</span>
                                <i class='fa-solid fa-angle-up fa-rotate-90 rightCarret'></i>
                            </div>
                            
                            <div class='infoDiv FinfoDiv'>
                                <div class='infoDiv'></div>
                                    <i class='fa-solid fa-calendar-xmark icones'></i>
                                    <span class='subInfo' id='taskDate${data[i].id_task}'>${data[i].due_date}</span>
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
                        if(data[0]){
                            document.getElementById('searchCount').innerHTML=data[data.length-1].taskCount;
                        }else{
                            document.getElementById('searchCount').innerHTML=0;
                        }
                    }
                }
            }
            xhr.open('POST', 'search_tasks.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("search="+search);
        }
    </script>
        
        <div id="searchCont">
        
        </div>
           
    </div>
</body>
</html>