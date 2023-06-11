<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div id="stickyWall" class="mainDiv">
        <h1 class="todayTitle">Sticky Wall</h1>
        <div id="stickyContainer">
           <?php
                $sql="SELECT * FROM stickies WHERE id_user='{$_SESSION['id_user']}'";
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
</body>
</html>