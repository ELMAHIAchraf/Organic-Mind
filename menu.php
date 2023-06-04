<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
            
            <div class="container" id="upcomingOpt" onclick="showMain('upcoming'), changeDestCount(this.id)">
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

            <div class="container" id="todayOpt" onclick="showMain('today'), changeDestCount(this.id)">
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
</body>
</html>