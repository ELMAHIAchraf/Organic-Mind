<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <div id="listMain" class="mainDiv" >
        <h1 class="todayTitle" id="listName"></h1>
        <span  id="listCount">
            
        </span>
        <script>
        function getList(name_list){
            let search=document.getElementById('searchInput').value
            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        let data=JSON.parse(xhr.responseText);
                        document.getElementById("listName").innerHTML=name_list;
                        document.getElementById("listCount").innerHTML=data.length;
                        document.getElementById("listCont").innerHTML="";
                        for(let i=0; i<data.length; i++){

                            document.getElementById("listCont").innerHTML+=`
                                <div class='tasks cl${data[i].id_task}' id='${data[i].id_task}' onclick=\"controlTasksMenu('open', this.id)\">
                                    <div class='tasks2'>
                                        <span class='text noMtext tasksName' id='taskName${data[i].id_task}'>${data[i].name_task}</span>
                                        <i class='fa-solid fa-angle-up fa-rotate-90 rightCarret'></i>
                                    </div>
                                    
                                    <div class='infoDiv FinfoDiv'>
                                        <div class='infoDiv'></div>
                                            <i class='fa-solid fa-calendar-xmark icones'></i>
                                            <span class='subInfo' id='taskDate${data[i].id_task}'>${data[i].date}</span>
                                        </div>
                                        <div class='infoDiv'>
                                            <span class='subInfo count fix subCounts${data[i].id_task}' id='subCount${data[i].id_task}'>${data[i].subtaskCount}</span>
                                            <span class='subInfo'>Subtasks</span>
                                        </div>
                                        <div class='infoDiv LinfoDiv'>
                                            <div class='colors' id='taskListColor${data[i].id_task}' style='background-color:${data[i].color_list}'></div>
                                            <span class='subInfo' id='taskListName${data[i].id_task}'>${data[i].name_list}</span>
                                        </div>
                                </div>
                                `;
                        }
                    }
                }
            }
            xhr.open('POST', 'get_list.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("name_list="+name_list);
        }
    </script>
        
        <div id="listCont">
        
        </div>
           
    </div>
</body>
</html>