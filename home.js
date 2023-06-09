function menuControl(action){
    if(action=='open'){
        document.getElementById('menu').style.display='inline-block';
        document.getElementById('openMenu').style.display='none';

    }else{
        document.getElementById('openMenu').style.display='block';
        document.getElementById('menu').style.display='none';


    }
}
function controlTasksMenu(action, id_task){
    if(action=='open'){
        document.getElementById('Task').style.display='inline-block';

            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        let task=JSON.parse(xhr.responseText);
                        document.getElementById('idInput').value=task.id_task;
                        document.getElementById('nameInput').value=task.name_task;
                        document.getElementById('descriptionInput').value=task.description_task;
                        /* list wont appear*/
                        document.getElementById('list'+task.id_list).selected="true";
                        document.getElementById('dateInput').value=task.due_date;
                        document.getElementById('timeInput').value=task.due_time;


                        if(task.subtasks){
                            let subtasks='';
                            for(let i=0; i < task.subtasks.length; i++){
                                subtasks+=`
                                    <div class='Subtask' id='${task.subtasks[i].id_subtask}' onmouseover="showTrash(${i})" onmouseleave="hideTrash(${i})">
                                        <i class='fa-duotone fa-list-tree icones'></i>
                                        <span class='text noMtext'>${task.subtasks[i].subtask}</span>
                                        <i class="fa-solid fa-trash-can subtaskTrash"  onclick="deleteSubtask(this.parentNode.id)" onmouseover="shakeTrash(${i})" onmouseleave="stopShaking(${i})"></i>
                                    </div>
                                `;
                            }
                            document.getElementById('subtasks').innerHTML=subtasks;
                        }else{
                            document.getElementById('subtasks').innerHTML="";
                        }

                    }
                }
            }
            xhr.open('POST', 'get_task_data.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('id_task='+id_task);

    }else{
        document.getElementById('Task').style.display='none';
    }   
}
function deleteSubtask(id_subtask){
    let subtask=document.getElementById(id_subtask).id;

        let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        document.getElementById(id_subtask).style.display="none";
                        
                        let className=document.getElementsByClassName(`subCounts${xhr.responseText}`);
                        let count=className[0].innerHTML;
                        count--;
                        for(let i=0; i<className.length; i++){
                            className[i].innerHTML=count;
                        }
                    }
                }
            }
            xhr.open('POST', 'remove_subtask.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('id_subtask='+subtask);
}
function shakeTrash(index){
    document.getElementsByClassName('subtaskTrash')[index].className="fa-solid fa-trash-can fa-shake subtaskTrash";
}
function stopShaking(index){
    document.getElementsByClassName('subtaskTrash')[index].className="fa-solid fa-trash-can subtaskTrash";
}

function showTrash(index){
    document.getElementsByClassName('subtaskTrash')[index].style.display='block';
    setTimeout(function(){
    document.getElementsByClassName('subtaskTrash')[index].style.opacity='1';
    document.getElementsByClassName('subtaskTrash')[index].style.transition='1s';
    });
}
function hideTrash(index){
    document.getElementsByClassName('subtaskTrash')[index].style.display='none';
    document.getElementsByClassName('subtaskTrash')[index].style.opacity='0';
}

let oldclicked='today';
function showMain(div){

    if(clicked){
        document.getElementById(clicked).style.display="none";
        document.getElementById(clicked+"Text").style.fontWeight='500';
        document.getElementById(clicked+"Opt").style.backgroundColor='#F1F1F1';
        document.getElementById(clicked+"listCount").style.backgroundColor='#e4e4e4';
    }

    document.getElementById('listMain').style.display="none";
    let divs=document.getElementsByClassName('container');
    

    document.getElementById(oldclicked+"Opt").style.backgroundColor='#F1F1F1';

    document.getElementById(oldclicked+"Text").style.fontWeight='500';
    document.getElementById(div+"Text").style.fontWeight='600';



    document.getElementById(div+"Opt").style.backgroundColor='#e4e4e4';
    
    if(div=="upcoming" || div=="today"){
        if(oldclicked=="upcoming" || oldclicked=="today"){
            document.getElementById(oldclicked+"CountTask").style.backgroundColor='#e4e4e4';
        }
        document.getElementById(div+"CountTask").style.backgroundColor='white';
    }else{
        if(oldclicked=="upcoming" || oldclicked=="today"){
            document.getElementById(oldclicked+"CountTask").style.backgroundColor='#e4e4e4';
        }
    }

    document.getElementById(oldclicked).style.display='none';
    document.getElementById(div).style.display='inline-block';
    oldclicked=div;

    document.getElementById("searchMain").style.display='none';

}

function displayStickyForm(){
    document.getElementById('name').value='';
    document.getElementById('description').value='';
    document.getElementById('transparent-bg').style.display='flex';
    document.getElementById('name').focus();
}

function displayListForm(){
    document.getElementById('nameList').value='';
    document.getElementById('transparent-bgL').style.display='flex';
    document.getElementById('nameList').focus();
}
function saveTaskChanges(){
    let name=document.getElementById('nameInput').value;
    let description=document.getElementById('descriptionInput').value;
    let list=document.getElementById('listInput').value;
    let date=document.getElementById('dateInput').value;
    let time=document.getElementById('timeInput').value;
    let task=document.getElementById('idInput').value;

    let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        let task=JSON.parse(xhr.responseText);
                        if(task.remove==0){
                            document.getElementById('nameInput').value=task.name_task;
                            document.getElementById('descriptionInput').value=task.description_task;
                            document.getElementById(task.name_list).setAttribute('selected', 'selected');
                            document.getElementById('dateInput').value=task.due_date;
                            document.getElementById('timeInput').value=task.time;
                            document.getElementById('idInput').value=task.id_task;
                            document.getElementById('taskName'+task.id_task).innerHTML=task.name_task;
                            document.getElementById('taskDate'+task.id_task).innerHTML=task.due_dateS;
                            document.getElementById('taskListColor'+task.id_task).style.backgroundColor=task.color_list;
                            document.getElementById('taskListName'+task.id_task).innerHTML=task.name_list;
                        }else{
                            let id=document.getElementById("idInput").value;
                            document.getElementById(id).style.display="none";
                            document.getElementById("Task").style.display="none";
                        }

                        let oldList=document.getElementById('listCount'+task.oldId_list).innerHTML;
                        oldList--;
                        document.getElementById('listCount'+task.oldId_list).innerHTML=oldList;
                        let newList=document.getElementById('listCount'+task.id_list).innerHTML;
                        newList++;
                        document.getElementById('listCount'+task.id_list).innerHTML=newList;
                    }
                }
            }
            xhr.open('POST', 'modify_task_data.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('id_task='+task+'&name='+name+'&description='+description+'&list='+list+'&date='+date+'&time='+time);
}

function deleteTask(){
    let task=document.getElementById('idInput').value;
    let tasks=document.getElementsByClassName('cl'+task);

    let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText){
                        for(let i=0; i<tasks.length; i++){
                            tasks[i].style.display="none";
                        }        

                        let container=document.getElementById('containerId').value;
                        container=container.substring(0, container.length-1);
                        container=container.split(";");     
                        countName=container[0];

                        if(countName=="tasksCont"){
                            let count=document.getElementById('todayCount').innerHTML;
                            count--;
                            document.getElementById('todayCount').innerHTML=count;

                            let countTask=document.getElementsByClassName('count')[1].innerHTML;
                            countTask--;
                            document.getElementsByClassName('count')[1].innerHTML=countTask;
                        }else{
                            let count=document.getElementById('upcomingCount').innerHTML;
                            count--;
                            document.getElementById('upcomingCount').innerHTML=count;

                            let countTask=document.getElementsByClassName('count')[0].innerHTML;
                            countTask--;
                            document.getElementsByClassName('count')[0].innerHTML=countTask;
                        }

                        
                        let countList=document.getElementById('listCount'+xhr.responseText).innerHTML;
                        countList--;
                        document.getElementById('listCount'+xhr.responseText).innerHTML=countList;
                    }
                }
            }
            xhr.open('POST', 'remove_task.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('id_task='+task);
            document.getElementById('Task').style.display='none';
}
function displaySubtaskForm(){
    document.getElementById('nameS').value='';
    document.getElementById('transparent-bgS').style.display='flex';
    document.getElementById('nameS').focus();
}

function displayTaskForm(destinationDiv, minDate, maxDate){
    document.getElementById('nameInputT').value='';
    document.getElementById('descriptionInputT').value='';
    document.getElementById('transparent-bgT').style.display='flex';
    document.getElementById('containerId').value=destinationDiv;
    document.getElementById('dateInputT').setAttribute('min', minDate);
    document.getElementById('dateInputT').setAttribute('max', maxDate);
    document.getElementById('dateInputT').value=minDate;
    document.getElementById('nameInputT').focus();
}
function changeDestCount(destValue){
    if(destValue=='todayOpt'){
        document.getElementById('containerId').value='tasksCont;';
    }else{
        document.getElementById('containerId').value='tomorrowTasksCont;';
    }
}
function slideLeft(){
    for(let i=0; i<time.length; i++){
        if(document.getElementsByClassName('dates')[i].style.backgroundColor=='rgb(221, 221, 221)'){
            alreadyclicked=document.getElementsByClassName('dates')[i].id;
        }
    }

    let index=time.indexOf(alreadyclicked);
    if(index==0){
        index=time.length-1;
    }else{
        index--;
    }
    let id=document.getElementsByClassName('dates')[index].id;
    switchDate(id);
}
            
function slideRight(){
    for(let i=0; i<time.length; i++){
        if(document.getElementsByClassName('dates')[i].style.backgroundColor=='rgb(221, 221, 221)'){
            alreadyclicked=document.getElementsByClassName('dates')[i].id;
        }
    }

    let index=time.indexOf(alreadyclicked);
    if(index==time.length-1){
        index=0;
    }else{
        index++;
    }
    let id=document.getElementsByClassName('dates')[index].id;
    switchDate(id);
}
function search(){
    if(event.key=='Enter'){
       let divs=['today', 'upcoming', 'calendar', 'stickyWall'];
       for(let i=0; i<divs.length; i++){
        document.getElementById(divs[i]).style.display='none';
        document.getElementById(divs[i]+"Opt").style.backgroundColor='#F1F1F1';
        document.getElementById(divs[i]+"Text").style.fontWeight='500';
       } 
       document.getElementById("upcomingCountTask").style.backgroundColor='#e4e4e4';
       document.getElementById("todayCountTask").style.backgroundColor='#e4e4e4';

       document.getElementById("searchMain").style.display='block';
       seachTasks();
    }
}

let clicked;
let id_list;
function showList(name_list, listId){
    document.getElementById('searchMain').style.display="none";
    
        document.getElementById(oldclicked).style.display="none";
        document.getElementById(oldclicked+"Text").style.fontWeight='500';
        document.getElementById(oldclicked+"Opt").style.backgroundColor='#F1F1F1';
        if(oldclicked=="upcoming" || oldclicked=="today"){
            document.getElementById(oldclicked+"CountTask").style.backgroundColor='#e4e4e4';
        }

    let divs2=document.getElementsByClassName('container_list');

    for(let i=0; i <divs2.length; i++){
        document.getElementsByClassName('text_list')[i].style.fontWeight='500';
        document.getElementsByClassName('container_list')[i].style.backgroundColor='#F1F1F1';
        document.getElementsByClassName('count_list')[i].style.backgroundColor='#e4e4e4';
    }

    document.getElementById('listMain').style.display="block";
    getList(name_list);

    document.getElementById(name_list+"Text").style.fontWeight='600';
    document.getElementById(name_list+"Opt").style.backgroundColor='#e4e4e4';
    document.getElementById(name_list+"listCount").style.backgroundColor='white';
    

    clicked=name_list;
    id_list=listId;

}
function removeList(){
        let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText==1){
                        document.getElementById(clicked+"Opt").style.display="none";
                        document.getElementById("listMain").style.display="none";
                        showMain("today");
                    }
                }
            }
            xhr.open('POST', 'remove_list.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('id_list='+id_list);
}


