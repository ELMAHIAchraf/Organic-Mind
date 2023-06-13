<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #transparent-bg{
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
            height: 500px;
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
    <div id="transparent-bg" onclick="hideForm()">
        <div id="form-div">
            <form id="addStickyForm">
                <h1>Sticky Wall:</h1>
                <div class="inputsDiv"><input class="inputs" type="text" id="name" name="name" placeholder="Name"></div><br>
                <div class="inputsDiv"><textarea class="inputs" id="description" placeholder="Description" name="description"></textarea></div><br>
                <div class="inputsDiv"><label id="colorLabel">Color</label>&nbsp;<input id="color" class="inputs" type="color" name="color"></div><br>
                <button type="button" id="addButton" onclick="addSticky()"><i class="fa-sharp fa-solid fa-plus"></i>&ensp;Add</button>
            </form>
        </div>
    </div>
    <script>
         function hideForm(){
            if(event.target.id=='transparent-bg'){
                document.getElementById('transparent-bg').style.display="none";
            }
        }
        function addSticky(){
            let name=document.getElementById('name').value;
            let description=document.getElementById('description').value;
            let color=document.getElementById('color').value;

            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    let sticky=JSON.parse(xhr.responseText);

                    let stickyDiv=document.createElement('div');
                    stickyDiv.setAttribute('class', 'stickyDiv');
                    // stickyDiv.setAttribute('id', '');
                    stickyDiv.setAttribute('style', `background-color:${sticky.color};`);

                    let description=sticky.description;
                    description=description.replace(/-/g, "<br>-");
                    stickyDiv.innerHTML=`
                            <h3 class='stickyHeader'>${sticky.name}</h3>
                                <p class='stickyContent'>${description}</p>
                                <div class='trashContainer' onclick='sortIndexes();removeSticky(this.parentNode.id)'><i class='fa-solid fa-trash-can trashIcon'></i></div>
                            <input type='hidden' class='idValue' value='${sticky.id_sticky}'>
                        `;
                        
                    let addSticky=document.getElementById('addSticker');
                    document.getElementById('stickyContainer').insertBefore(stickyDiv, addSticky);
                }
            }
            xhr.open('POST', 'add_sticky.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('name='+name+"&description="+description+"&color="+color);
            document.getElementById('transparent-bg').style.display='none';
        }
        function sortIndexes(){
            let stickyDivs=document.getElementsByClassName('stickyDiv');
            for(let i=0; i < stickyDivs.length; i++){
                if(document.getElementsByClassName('stickyDiv')[i].id!='addSticker'){
                    document.getElementsByClassName('stickyDiv')[i].id=i;
                }
            }
        }
        function removeSticky(index){
            let id_sticky=document.getElementsByClassName('idValue')[index].value;

            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText==1){
                        document.getElementsByClassName('stickyDiv')[index].remove();
                    }
                }
            }
            xhr.open('POST', 'remove_sticky.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('id_sticky='+id_sticky);
        }
    </script>
</body>
</html>