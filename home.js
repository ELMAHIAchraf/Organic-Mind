function menuControl(action){
    if(action=='open'){
        document.getElementById('menu').style.display='inline-block';
        document.getElementById('openMenu').style.display='none';

    }else{
        document.getElementById('openMenu').style.display='block';
        document.getElementById('menu').style.display='none';


    }
}
function controlTasksMenu(action){
    if(action=='open'){
        document.getElementById('Task').style.display='inline-block';
    }else{
        document.getElementById('Task').style.display='none';
    }
}
let oldclicked='today';
function showMain(div){
    document.getElementById(div+"Opt").style.backgroundColor='#e4e4e4';
    document.getElementById(oldclicked+"Opt").style.backgroundColor='transparent';

    document.getElementById(div).style.display='inline-block';
    document.getElementById(oldclicked).style.display='none';
    oldclicked=div;
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