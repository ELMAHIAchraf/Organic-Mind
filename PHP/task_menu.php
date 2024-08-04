<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                                        echo "<option id='list{$tab4['id_list']}' value='{$tab4['id_list']}'>{$tab4['name_list']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="date">
                        <br><label class="text">Due date</label>
                        <div class="metaInfoDiv metaInfoDiv2"><input id="dateInput" min="<?php echo date("Y-m-d") ?>" type="date" class="metaInfo"></div>
                        <input type="hidden" id="idInput">
                    </div>
                    <div id="time">
                        <br><div class="metaInfoDiv metaInfoDiv2"><input id="timeInput" type="time" class="metaInfo"></div>
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