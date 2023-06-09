<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #transparent-bgL{
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.736);
            position: fixed;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }
        #form-divL{
            width: 25%;
            height: 300px;
            background-color: white;
            border-radius: 10px;
            background-color: #F1F1F1;
            display: flex;
            align-items: center;
        }
        #addListForm{
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
        #color{
            width: 80%;
            cursor: pointer;
        }
        #description{
            height: 150px;
            resize: none;
        }
        #addButton{
            border: none;
            padding: 10px 30px;
            font-size: 16px;
            font-weight: bold;
            color: #484848;
            cursor: pointer;
            background-color: #ffd630;  
            border-radius: 6px;
        }
        #colorLabel{
            color: #656565;
            font-size: 13px;
        }
        
        
    </style>
</head>
<body>
    <div id="transparent-bgL" onclick="hideFormL()">
        <div id="form-divL">
            <form id="addListForm">
                <h1>List:</h1>
                <div class="inputsDiv"><input class="inputs" type="text" id="nameList" name="name" placeholder="Name"></div><br>
                <div class="inputsDiv"><label id="colorLabel">Color</label>&nbsp;<input id="colorList" class="inputs" type="color" name="color"></div><br>
                <button type="button" id="addButton" onclick="addList()"><i class="fa-sharp fa-solid fa-plus"></i>&ensp;Add</button>
            </form>
        </div>
    </div>
    <script>
         function hideFormL(){
            if(event.target.id=='transparent-bgL'){
                document.getElementById('transparent-bgL').style.display="none";
            }
        }
        function addList(){
            let name=document.getElementById('nameList').value;
            let color=document.getElementById('colorList').value;

            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){

                    let list=JSON.parse(xhr.responseText);

                    document.getElementById('listOnly').innerHTML+=`
                            <div class='container_list' id='${list.name}Opt' onclick='showList(\"${list.name}\", ${list.id_list})'>

                                <div class='sub-container' id='list${list.id_list}'>
                                    <div class='colors' style='background-color:${list.color};'></div>
                                    <span class='text_list' id='${list.name}Text'>${list.name}</span>
                                </div>
                                <span  class='count_list' id='listCount${list.id_list}'>0</span>
                            </div>
                        `;

                    document.getElementById('listInput').innerHTML+=`
                        <option id='${list.name}' value='${list.id_list}'>${list.name}</option>
                    `;
                    document.getElementById('listInputT').innerHTML+=`
                        <option id='${list.name}' value='${list.id_list}'>${list.name}</option>
                    `;
                }
            }
            xhr.open('POST', 'add_list.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('name='+name+"&color="+color);
            document.getElementById('transparent-bgL').style.display='none';
        }
    </script>
</body>
</html>