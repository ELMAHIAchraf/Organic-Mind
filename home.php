<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Default" href="/css/app-af6a05f42b013986b481566363f0186f.css?vsn=d">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-cc491567b46eab1188c6538ebc462e7d.css?vsn=d">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="home.js" defer></script>
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
</head>
<body>
    <?php 
        include('connexion.php');
        include('add_sticky_form.php');
        include('add_list_form.php');
    ?>
    <i id="openMenu" class="fa-solid fa-bars menuIcon" onclick="menuControl('open')"></i>

    
    <div id="menu">
        
        <div id="sandwitchDiv">
            <span id="menuText">Menu</span>
            <i  class="fa-solid fa-bars menuIcon" onclick="menuControl('close')"></i>
        </div>

        <div id="search">
            <div id="searchDiv">
                <i id="searchIcon" class="fa-solid fa-magnifying-glass"></i>
                <input id="searchInput" type="search" placeholder="Search">
            </div>
        </div>

        <div id="main">
            <span id="tasksText">TASKS</span>  
            
            <div class="container" id="upcomingOpt" onclick="showMain('upcoming')">
                <div class="sub-container">
                    <i class="fa-solid fa-angles-right icones"></i>
                    <span class="text">Upcoming</span>
                </div>
                <span  class="count">12</span>
            </div>

            <div class="container" id="todayOpt" onclick="showMain('today')">
                <div class="sub-container">
                    <i class="fa-solid fa-list-check icones"></i>
                    <span class="text">Today</span>
                </div>
                <span  class="count" >2</span>
            </div>

            <div class="container" id="calendarOpt" onclick="showMain('calendar')">
                <div class="sub-container">
                    <i class="fa-solid fa-calendar-days icones"></i>
                    <span class="text">Calendar</span>
                </div>
            </div>

            <div class="container" id="stickyWallOpt" onclick="showMain('stickyWall')">
                <div class="sub-container">
                    <i class="fa-solid fa-note-sticky icones"></i>
                    <span class="text">Sticky Wall</span>
                </div>
            </div>
        </div>
        <hr>
        <div id="listContainer">
            <span id="tasksText">LISTS</span> 

            <div id="listOnly"> 
                <?php
                    $sql2="SELECT * FROM lists WHERE id_user=1";
                    $query2=mysqli_query($conn, $sql2);
                    while($tab2=mysqli_fetch_assoc($query2)){
                        echo "
                            <div class='container'>
                                <div class='sub-container'>
                                    <div class='colors' style='background-color:{$tab2['color_list']};'></div>
                                    <span class='text'>{$tab2['name_list']}</span>
                                </div>
                                <span  class='count'>5</span>
                            </div>
                            ";
                    }
                ?>
            </div>
            <div class="container" id="addList" onclick="displayListForm()">
                <div class="sub-container">
                    <i class="fa-solid fa-plus icones noMIcon"></i>
                    <span class="text noMtext">Add New List</span>
                </div>
            </div>
        </div>


            <div class="container" id="signout">
                <div class="sub-container">
                    <i class="fa-solid fa-right-from-bracket icones noMIcon"></i>
                    <span class="text noMtext" id="addText">Sign out</span>
                </div>
            </div>
            

    </div>

    <div id="today" class="mainDiv" >
        <h1 class="todayTitle">Today</h1>
        <span  id="todayCount">2</span>

        <div id="addTask">
            <div class="sub-addTask">
                <i class="fa-solid fa-plus icones noMIcon"></i>
                <span class="text noMtext">Add New Task</span>
            </div>
        </div>

        <div class="tasks" onclick="controlTasksMenu('open')">
            <div class="tasks2">
                <span class="text noMtext tasksName">Research content ideas</span>
                <i class="fa-solid fa-angle-up fa-rotate-90 rightCarret"></i>
            </div>
            
            <div class="infoDiv FinfoDiv">
                <div class="infoDiv"></div>
                    <i class="fa-solid fa-calendar-xmark icones"></i>
                    <span class="subInfo">22-03-22</span>
                </div>
                <div class="infoDiv">
                    <span class="subInfo count fix">1</span>
                    <span class="subInfo">Subtasks</span>
                </div>
                <div class="infoDiv LinfoDiv">
                    <div class="colors Pcolor"></div>
                    <span class="subInfo">Personal</span>
                </div>
            </div>

            <div class="tasks">
                <div class="tasks2">
                    <span class="text noMtext tasksName">Create database of guest authors</span>
                    <i class="fa-solid fa-angle-up fa-rotate-90 rightCarret"></i>
                </div>
                
                <div class="infoDiv FinfoDiv">
                    <div class="infoDiv"></div>
                        <i class="fa-solid fa-calendar-xmark icones"></i>
                        <span class="subInfo">22-06-22</span>
                    </div>
                    <div class="infoDiv">
                        <span class="subInfo count fix">0</span>
                        <span class="subInfo">Subtasks</span>
                    </div>
                    <div class="infoDiv LinfoDiv">
                        <div class="colors Wcolor"></div>
                        <span class="subInfo">Work</span>
                    </div>
                </div>
    </div>
    <!-------------------------HERE---------------------------->
    <div id="upcoming" class="mainDiv">

        <h1 class="todayTitle">Upcoming</h1>
        <span  id="todayCount">2</span>

        <div id="upcomingContainer"> 
            <div class="upcomingDivs">         
            <h1 class="subTitle">Tomorrow</h1>
            <div id="addTask">

                <div class="sub-addTask">
                    <i class="fa-solid fa-plus icones noMIcon"></i>
                    <span class="text noMtext">Add New Task</span>
                </div>
            </div>

            <div class="tasks" onclick="controlTasksMenu('open')">
                <div class="tasks2">
                    <span class="text noMtext tasksName">Create job posting for SEO specialist</span>
                    <i class="fa-solid fa-angle-up fa-rotate-90 rightCarret"></i>
                </div>
                
                <div class="infoDiv FinfoDiv">
                    <div class="infoDiv"></div>
                        <i class="fa-solid fa-calendar-xmark icones"></i>
                        <span class="subInfo">22-03-22</span>
                    </div>
                    <div class="infoDiv">
                        <span class="subInfo count fix">2</span>
                        <span class="subInfo">Subtasks</span>
                    </div>
                    <div class="infoDiv LinfoDiv">
                        <div class="colors Lcolor"></div>
                        <span class="subInfo">List 1</span>
                    </div>
                </div>

                <div class="tasks">
                    <div class="tasks2">
                        <span class="text noMtext tasksName">Reuqest design assets for landing page</span>
                        <i class="fa-solid fa-angle-up fa-rotate-90 rightCarret"></i>
                    </div>
                    
                    <div class="infoDiv FinfoDiv">
                        <div class="infoDiv"></div>
                            <i class="fa-solid fa-calendar-xmark icones"></i>
                            <span class="subInfo">22-06-22</span>
                        </div>
                        <div class="infoDiv">
                            <span class="subInfo count fix">0</span>
                            <span class="subInfo">Subtasks</span>
                        </div>
                        <div class="infoDiv LinfoDiv">
                            <div class="colors Wcolor"></div>
                            <span class="subInfo">Work</span>
                        </div>
                    </div>
            </div>
            <div class="upcomingDivs">         
                <h1 class="subTitle">This Week</h1>

                <div id="addTask">
                    <div class="sub-addTask">
                        <i class="fa-solid fa-plus icones noMIcon"></i>
                        <span class="text noMtext">Add New Task</span>
                    </div>
                </div>

                <div class="taskContainer">
                <div class="tasks" onclick="controlTasksMenu('open')">
                    <div class="tasks2">
                        <span class="text noMtext tasksName">Consult accountant</span>
                        <i class="fa-solid fa-angle-up fa-rotate-90 rightCarret"></i>
                    </div>
                    
                    <div class="infoDiv FinfoDiv">
                        <div class="infoDiv"></div>
                            <i class="fa-solid fa-calendar-xmark icones"></i>
                            <span class="subInfo">22-03-22</span>
                        </div>
                        <div class="infoDiv">
                            <span class="subInfo count fix">1</span>
                            <span class="subInfo">Subtasks</span>
                        </div>
                        <div class="infoDiv LinfoDiv">
                            <div class="colors Wcolor"></div>
                            <span class="subInfo">Work</span>
                        </div>
                    </div>
    
                    <div class="tasks">
                        <div class="tasks2">
                            <span class="text noMtext tasksName">Print business card</span>
                            <i class="fa-solid fa-angle-up fa-rotate-90 rightCarret"></i>
                        </div>
                        
                        <div class="infoDiv FinfoDiv">
                            <div class="infoDiv"></div>
                                <i class="fa-solid fa-calendar-xmark icones"></i>
                                <span class="subInfo">22-06-22</span>
                            </div>
                            <div class="infoDiv">
                                <span class="subInfo count fix">0</span>
                                <span class="subInfo">Subtasks</span>
                            </div>
                            <div class="infoDiv LinfoDiv">
                                <div class="colors Wcolor"></div>
                                <span class="subInfo">Work</span>
                            </div>
                        </div>
                        
                        
                       
                    </div>
                </div>
        </div>  
    </div>

    <div id="calendar" class="mainDiv">calendar</div>

    <div id="stickyWall" class="mainDiv">
        <h1 class="todayTitle">Sticky Wall</h1>
        <div id="stickyContainer">
           <?php
                $sql="SELECT * FROM stickies WHERE id_user=1";
                $query=mysqli_query($conn, $sql);
                while($tab=mysqli_fetch_assoc($query)){
                    $description=$tab['description_sticky'];
                    $description=str_replace('-', '<br>-', $description);
                    echo "
                        <div class='stickyDiv' id='' style='background-color:{$tab['color_sticky']};'>
                            <h3 class='stickyHeader'>{$tab['name_sticky']}</h3>
                            <p class='stickyContent'>{$description}</p>
                            <div class='trashContainer' onclick='sortIndexes();removeSticky(this.parentNode.id)'><i class='fa-solid fa-trash-can trashIcon'></i></div>
                            <input type='hidden' class='idValue' value='{$tab['id_sticky']}'>
                        </div>
                    ";
                }
           ?>
            <div class="stickyDiv mainAddSticky" id="addSticker" onclick="displayStickyForm()"><i class="fa-sharp fa-regular fa-plus-large" id="addIcon"></i></div>

        </div>
    </div>

    <div id="Task">
        <div id="sandwitchDiv">
            <span id="menuText">Task:</span>
            <i class="fa-solid fa-xmark menuIcon" onclick="controlTasksMenu('close')"></i>
        </div>

        <div>
                <form action="" method="POST">
                    <div id="taskName">
                        <input class="inputs"  type="text" placeholder="Task's name" value="Research content ideas">
                    </div>
                    <div id="taskDesc">
                        <textarea name="" class="inputs">Description</textarea>
                    </div>
                    <div id="list">
                        <br><label class="text">List</label>
                        <div class="metaInfoDiv metaInfoDiv1">
                            <select name="" class="metaInfo" id="">
                                <option value="Work">Work</option>
                                <option value="Personal">Personal</option>
                                <option value="Liste 1">Liste 1</option>
                            </select>
                        </div>
                    </div>
                    <div id="date">
                        <br><label class="text">Due date</label>
                        <div class="metaInfoDiv metaInfoDiv2"><input type="date" class="metaInfo"></div>
                    </div>
                </form>
        </div>

        <div id="subtaskDiv">
            <span id="SubtaskText">Subtasks:</span>

            <div>
                <div id="addSubtask">
                    <div >
                        <i class="fa-solid fa-plus icones noMIcon"></i>
                        <span class="text noMtext">Add New Subtask</span>
                    </div>
                </div>
                <div id="subtasks">
                    <div class="Subtask">
                        <i class="fa-duotone fa-list-tree icones"></i>
                        <span class="text noMtext">Subtask 1</span>
                    </div>
                    <div class="Subtask">  
                        <i class="fa-duotone fa-list-tree icones"></i>
                        <span class="text noMtext">Subtask 2</span>
                    </div>
                    <div class="Subtask">  
                        <i class="fa-duotone fa-list-tree icones"></i>
                        <span class="text noMtext">Subtask 3</span>
                    </div>
                    <div class="Subtask">  
                        <i class="fa-duotone fa-list-tree icones"></i>
                        <span class="text noMtext">Subtask 4</span>
                    </div>
                    <div class="Subtask">  
                        <i class="fa-duotone fa-list-tree icones"></i>
                        <span class="text noMtext">Subtask 5</span>
                    </div>
                    <div class="Subtask">  
                        <i class="fa-duotone fa-list-tree icones"></i>
                        <span class="text noMtext">Subtask 6</span>
                    </div>
                    <div class="Subtask">  
                        <i class="fa-duotone fa-list-tree icones"></i>
                        <span class="text noMtext">Subtask 7</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="buttons">
            <div id="delButtDiv"><button id="delButt">Delete Task</button></div>
            <button id="saveButt">Save changes</button>
        </div>

    
    </div>

    


        
            
</body>
</html>