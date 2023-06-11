<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #transparent-bgS{
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.736);
            position: fixed;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }
        #form-divS{
            width: 28%;
            height: 250px;
            background-color: white;
            border-radius: 10px;
            background-color: #F1F1F1;
            display: flex;
            align-items: center;
        }
        #addsubTaskForm{
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
        .inputsDiv{
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 60%;
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
        #addButtonS{
            border: none;
            padding: 10px 30px;
            font-size: 16px;
            font-weight: bold;
            color: #484848;
            cursor: pointer;
            background-color: #ffd630;  
            border-radius: 6px;
        }
        
        
    </style>
</head>
<body>
    <div id="transparent-bgS" onclick="hideFormS()">
        <div id="form-divS">
            <form id="addsubTaskForm">
                <h1>Subtask:</h1>
                <div class="inputsDiv"><input class="inputs" type="text" id="nameS" placeholder="Name"></div><br>
                <button type="button" id="addButtonS" onclick="addSubtask()"><i class="fa-sharp fa-solid fa-plus"></i>&ensp;Add</button>
            </form>
        </div>
    </div>
    <script>
         function hideFormS(){
            if(event.target.id=='transparent-bgS'){
                document.getElementById('transparent-bgS').style.display="none";
            }
        }
        function addSubtask(){
            let name=document.getElementById('nameS').value;
            let id_task=document.getElementById('idInput').value;
            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        let subtask=JSON.parse(xhr.responseText);
                        let index=document.getElementsByClassName('Subtask').length;
                        document.getElementById('subtasks').innerHTML+=`
                                    <div class="Subtask" id='${subtask.id_subtask}' onmouseover="showTrash(${index})" onmouseleave="hideTrash(${index})">
                                        <i class='fa-duotone fa-list-tree icones'></i>
                                        <span class="text noMtext">${subtask.name}</span>
                                        <i class="fa-solid fa-trash-can subtaskTrash" onclick="deleteSubtask(this.parentNode.id)" onmouseover="shakeTrash(${index})" onmouseleave="stopShaking(${index})"></i>
                                    </div>
                            `;
                        let className=document.getElementsByClassName(`subInfo count fix subCounts${subtask.id_task}`);
                        let count=className[0].innerHTML;
                        count++;
                        for(let i=0; i<className.length; i++){
                            className[i].innerHTML=count;
                        }
                    //    let className=document.getElementById(`subCount${subtask.id_task}`); 
                    //     let count=className.innerHTML;
                    //     count++;     
                    //     className.innerHTML=count;             
                    }
                }
            }
            xhr.open('POST', 'add_subtask.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('id_task='+id_task+'&name='+name);
            document.getElementById('transparent-bgS').style.display='none';
        }
    </script>
</body>
</html>