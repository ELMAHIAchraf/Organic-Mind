<?php
    include('connexion.php');

        if(isset($_POST['name']) and !empty($_POST['name']) &&
           isset($_POST['description']) and !empty($_POST['description']) &&
           isset($_POST['list']) and !empty($_POST['list']) &&
           isset($_POST['date']) and !empty($_POST['date'])){

                $name=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['name'])));
                $description=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['description'])));
                $list=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['list'])));
                $date=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['date'])));

                $sql2="SELECT * FROM lists WHERE id_list=$list";
                $query2=mysqli_query($conn, $sql2);
                $tab2=mysqli_fetch_assoc($query2);

                $sql="INSERT INTO tasks VALUES('', $list, '$name', '$description', '$date')";
                if(mysqli_query($conn, $sql)){
                    $id_task=mysqli_insert_id($conn);
                    $tab=array("name"=>$name, "date"=>$date, "id_task"=>$id_task,"id_list"=>$list, "name_list"=>$tab2["name_list"], "color_list"=>$tab2["color_list"]);
                    echo json_encode($tab);
                }else{
                    echo "Error:".mysqli_error($conn);
                }

           }
?>