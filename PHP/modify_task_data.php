<?php
    session_start();

    include('connexion.php');

        if(isset($_POST['name']) and !empty($_POST['name']) &&
           isset($_POST['description']) and !empty($_POST['description'])&&
           isset($_POST['list']) and !empty($_POST['list'])&&
           isset($_POST['id_task']) and !empty($_POST['id_task'])&&
           isset($_POST['date']) and !empty($_POST['date']) &&
           isset($_POST['time']) and !empty($_POST['time'])){

                $name=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['name'])));
                $description=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['description'])));
                $list=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['list'])));
                $date=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['date'])));
                $time=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['time'])));
                $id_task=trim(mysqli_escape_string($conn, htmlspecialchars($_POST['id_task'])));

                $dateS=date_create($date);
                $dateS=date_format($dateS, "y-m-d");
                $sql2="SELECT * FROM lists WHERE id_list=$list";
                $query2=mysqli_query($conn, $sql2);
                $tab2=mysqli_fetch_assoc($query2);

                $sql3="SELECT id_list, name_list FROM tasks NATURAL JOIN lists WHERE id_task=$id_task";
                $query3=mysqli_query($conn, $sql3);
                $tab3=mysqli_fetch_row($query3);
                
                
                

                $sql="UPDATE tasks SET id_list='$list',name_task='$name', description_task='$description',due_date='$date $time' WHERE id_task=$id_task";
                if(mysqli_query($conn, $sql)){
                    $data=array("newListId"=>$list, "newList"=>$tab2['name_list'], "oldList"=>$tab3[1], "oldListId"=>$tab3[0]);
                    echo json_encode($data);
                }else{
                    echo "Error:".mysqli_error($conn);
                }

           }
?>