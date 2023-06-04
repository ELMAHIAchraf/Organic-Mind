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
        include('add_subtask_form.php');
        include('add_task_form.php');
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
                <span  class="count">
                <?php
                    $date=date("Y-m-d");
                    $sql7="SELECT count(id_task) as taskCount FROM tasks NATURAL JOIN lists WHERE id_user=1 AND due_date>'$date'";
                    $query7=mysqli_query($conn, $sql7);
                    $tab7=mysqli_fetch_assoc($query7);
                    echo $tab7['taskCount'];
                ?>
                </span>
            </div>

            <div class="container" id="todayOpt" onclick="showMain('today')">
                <div class="sub-container">
                    <i class="fa-solid fa-list-check icones"></i>
                    <span class="text">Today</span>
                </div>
                <span  class="count" id="countTask">
                    <?php
                        $date=date("Y-m-d");
                         $sql5="SELECT count(id_task) as taskCount FROM tasks NATURAL JOIN lists WHERE id_user=1 AND due_date='$date'";
                         $query5=mysqli_query($conn, $sql5);
                         $tab5=mysqli_fetch_assoc($query5);
                         echo $tab5['taskCount'];
                    ?>
                </span>
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
                    $query2Dup=mysqli_query($conn, $sql2);
                    while($tab2=mysqli_fetch_assoc($query2)){
                        $sql6="SELECT count(id_task) FROM lists NATURAL JOIN tasks WHERE id_list={$tab2['id_list']} AND id_user=1";
                        $query6=mysqli_query($conn, $sql6);
                        $tab6=mysqli_fetch_row($query6);
                        echo "
                            <div class='container'>
                                <div class='sub-container'>
                                    <div class='colors' style='background-color:{$tab2['color_list']};'></div>
                                    <span class='text'>{$tab2['name_list']}</span>
                                </div>
                                <span  class='count' id='listCount{$tab2['id_list']}'>$tab6[0]</span>
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
        <span  id="todayCount">
            <?php
                $current_date=date('Y-m-d');
                 $sql5="SELECT count(id_task) AS tasksCount FROM tasks NATURAL JOIN lists WHERE id_user=1 AND due_date='$current_date'";
                 $query5=mysqli_query($conn, $sql5);
                 $tab5=mysqli_fetch_assoc($query5);
                 if(!empty($tab5)){
                    echo $tab5['tasksCount'];
                 }else{
                    echo 0;
                 }
            ?>
        </span>

        <div id="addTask">
            <div class="sub-addTask" onclick='displayTaskForm()'>
                <i class="fa-solid fa-plus icones noMIcon"></i>
                <span class="text noMtext">Add New Task</span>
            </div>
        </div>
        <div id="tasksCont">
        <?php
            $sql3="SELECT * FROM tasks NATURAL JOIN lists WHERE id_user=1 AND due_date='$current_date'";
            $query3=mysqli_query($conn, $sql3);
            while($tab3=mysqli_fetch_assoc($query3)){
                $sql4="SELECT count(id_task) as subtaskCount FROM subtasks WHERE id_task={$tab3['id_task']}";
                $query4=mysqli_query($conn, $sql4);
                $tab4=mysqli_fetch_row($query4);

                $date=date_create("{$tab3['due_date']}");
                $date=date_format($date,"y-m-d");
                echo "
                <div class='tasks' id='{$tab3['id_task']}' onclick=\"controlTasksMenu('open', this.id)\">
                    <div class='tasks2'>
                        <span class='text noMtext tasksName' id='taskName{$tab3['id_task']}'>{$tab3['name_task']}</span>
                        <i class='fa-solid fa-angle-up fa-rotate-90 rightCarret'></i>
                    </div>
                    
                    <div class='infoDiv FinfoDiv'>
                        <div class='infoDiv'></div>
                            <i class='fa-solid fa-calendar-xmark icones'></i>
                            <span class='subInfo' id='taskDate{$tab3['id_task']}'>$date</span>
                        </div>
                        <div class='infoDiv'>
                            <span class='subInfo count fix' id='subCount{$tab3['id_task']}'>$tab4[0]</span>
                            <span class='subInfo'>Subtasks</span>
                        </div>
                        <div class='infoDiv LinfoDiv'>
                            <div class='colors' id='taskListColor{$tab3['id_task']}' style='background-color:{$tab3['color_list']};'></div>
                            <span class='subInfo' id='taskListName{$tab3['id_task']}'>{$tab3['name_list']}</span>
                    </div>
                </div>
                ";
             }
        ?>
        </div>
           
    </div>
    <div id="upcoming" class="mainDiv">

        <h1 class="todayTitle">Upcoming</h1>
        <span  id="todayCount">
        <?php
             echo $tab7['taskCount'];
        ?>
        </span>

        <div id="upcomingContainer"> 
            <div class="upcomingDivs">         
            <h1 class="subTitle">Tomorrow</h1>
            <div id="addTask">

                <div class="sub-addTask">
                    <i class="fa-solid fa-plus icones noMIcon"></i>
                    <span class="text noMtext">Add New Task</span>
                </div>
            </div>

            <div id="tomorrowTasksCont">
                <?php
                    $date=date("Y-m-d", time()+24*3600);
                     $sql8="SELECT * FROM tasks NATURAL JOIN lists WHERE id_user=1 AND due_date='$date'";
                     $query8=mysqli_query($conn, $sql8);
                     while($tab8=mysqli_fetch_assoc($query8)){
                         $sql4="SELECT count(id_task) as subtaskCount FROM subtasks WHERE id_task={$tab8['id_task']}";
                         $query4=mysqli_query($conn, $sql4);
                         $tab4=mysqli_fetch_row($query4);
         
                         $date=date_create("{$tab8['due_date']}");
                         $date=date_format($date,"y-m-d");
                         echo "
                         <div class='tasks' id='{$tab8['id_task']}' onclick=\"controlTasksMenu('open', this.id)\">
                             <div class='tasks2'>
                                 <span class='text noMtext tasksName' id='taskName{$tab8['id_task']}'>{$tab8['name_task']}</span>
                                 <i class='fa-solid fa-angle-up fa-rotate-90 rightCarret'></i>
                             </div>
                             
                             <div class='infoDiv FinfoDiv'>
                                 <div class='infoDiv'></div>
                                     <i class='fa-solid fa-calendar-xmark icones'></i>
                                     <span class='subInfo' id='taskDate{$tab8['id_task']}'>$date</span>
                                 </div>
                                 <div class='infoDiv'>
                                     <span class='subInfo count fix' id='subCount{$tab8['id_task']}'>$tab4[0]</span>
                                     <span class='subInfo'>Subtasks</span>
                                 </div>
                                 <div class='infoDiv LinfoDiv'>
                                     <div class='colors' id='taskListColor{$tab8['id_task']}' style='background-color:{$tab8['color_list']};'></div>
                                     <span class='subInfo' id='taskListName{$tab8['id_task']}'>{$tab8['name_list']}</span>
                             </div>
                         </div>
                         ";
                      }
                ?>
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

                <div id="tomorrowTasksCont" >
                
                <?php
                        $date=date("Y-m-d", time()+24*3600);
                        $LastDayOfTheWeek=date("Y-m-d", strtotime("next Sunday"));
                        $sql9="SELECT * FROM tasks NATURAL JOIN lists WHERE id_user=1 AND (due_date BETWEEN '$date' AND '$LastDayOfTheWeek')";
                        $query9=mysqli_query($conn, $sql9);
                        while($tab9=mysqli_fetch_assoc($query9)){
                            $sql4="SELECT count(id_task) as subtaskCount FROM subtasks WHERE id_task={$tab9['id_task']}";
                            $query4=mysqli_query($conn, $sql4);
                            $tab4=mysqli_fetch_row($query4);
            
                            $date=date_create("{$tab9['due_date']}");
                            $date=date_format($date,"y-m-d");
                            echo "
                            <div class='tasks' id='{$tab9['id_task']}' onclick=\"controlTasksMenu('open', this.id)\">
                                <div class='tasks2'>
                                    <span class='text noMtext tasksName' id='taskName{$tab9['id_task']}'>{$tab9['name_task']}</span>
                                    <i class='fa-solid fa-angle-up fa-rotate-90 rightCarret'></i>
                                </div>
                                
                                <div class='infoDiv FinfoDiv'>
                                    <div class='infoDiv'></div>
                                        <i class='fa-solid fa-calendar-xmark icones'></i>
                                        <span class='subInfo' id='taskDate{$tab9['id_task']}'>$date</span>
                                    </div>
                                    <div class='infoDiv'>
                                        <span class='subInfo count fix' id='subCount{$tab9['id_task']}'>$tab4[0]</span>
                                        <span class='subInfo'>Subtasks</span>
                                    </div>
                                    <div class='infoDiv LinfoDiv'>
                                        <div class='colors' id='taskListColor{$tab9['id_task']}' style='background-color:{$tab9['color_list']};'></div>
                                        <span class='subInfo' id='taskListName{$tab9['id_task']}'>{$tab9['name_list']}</span>
                                </div>
                            </div>
                            ";
                         }  
                    ?>
                      
                              
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
                            <div class='trashContainer' onclick=();removeSticky(this.parentNode.id)'><i class='fa-solid fa-trash-can trashIcon'></i></div>
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
                <form >
                    <div id="taskName">
                        <input class="inputs" id="nameInput"  type="text" placeholder="Task's name">
                    </div>
                    <div id="taskDesc">
                        <textarea id="descriptionInput" class="inputs" placeholder="Description"></textarea>
                    </div>
                    <div id="list">
                        <br><label class="text">List</label>
                        <div class="metaInfoDiv metaInfoDiv1">
                            <select class="metaInfo" id="listInput">
                                <?php
                                    while($tab4=mysqli_fetch_assoc($query2Dup)){
                                        echo "<option id='{$tab4['name_list']}' value='{$tab4['id_list']}'>{$tab4['name_list']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="date">
                        <br><label class="text">Due date</label>
                        <div class="metaInfoDiv metaInfoDiv2"><input id="dateInput" type="date" class="metaInfo"></div>
                        <input type="hidden" id="idInput">
                    </div>
                </form>
        </div>

        <div id="subtaskDiv">
            <span id="SubtaskText">Subtasks:</span>

            <div>
                <div id="addSubtask">
                    <div onclick="displaySubtaskForm()">
                        <i class="fa-solid fa-plus icones noMIcon"></i>
                        <span class="text noMtext">Add New Subtask</span>
                    </div>
                </div>
                <div id="subtasks">
                    
                </div>
            </div>
        </div>
        <div id="buttons">
            <form>
                <div id="delButtDiv"><button type="button" id="delButt" onclick="deleteTask()">Delete Task</button></div>
                <button type="button" id="saveButt" onclick="saveTaskChanges()">Save changes</button>
            </form>
        </div>

    
    </div>

    


        
            
</body>
</html>