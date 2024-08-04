<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="calendar" class="mainDiv">
        <h1 id="todayTitle"><?php echo date('d F Y'); ?></h1>
            <div id="dateDivCont">
                <div id="datesCont">
                    <div class="dates" id="day" onclick="switchDate(this.id)">DAY</div>
                    <div class="dates" id="week"  onclick="switchDate(this.id)">Week</div>
                    <div class="dates" id="month"  onclick="switchDate(this.id)">Month</div>
                </div>
                <div id="arrowCont">
                    <div id="carretCo">
                        <i class="fa-regular fa-angle-left carrets" onclick="slideLeft()"></i>
                        <i class="fa-regular fa-angle-left fa-rotate-180 carrets" onclick="slideRight()"></i>
                    </div>
                </div>
            </div>
            <script>
                function updateTodayCalendar(){
                    let xhr = new XMLHttpRequest();
                    xhr.onload=function(){
                        if(xhr.status==200){
                            if(xhr.responseText){
                                let data=JSON.parse(xhr.responseText);
                                // document.getElementById('searchCont').innerHTML="";
                                let j=0;
                                for(let i=8; i <= 24;i++){
                                    document.getElementById(`lastRow${i}`).innerHTML="";
                                    if(data[j]!=0){
                                        document.getElementById(`lastRow${i}`).innerHTML=`
                                        <div class='taskDivTab' style='background-color: ${data[j].color_list}'>
                                            <p class='taskNameTab'>${data[j].name_task}</p>
                                        </div>
                                        `;
                                    }
                                j++;
                                }
                            }
                        }
                    }
                    xhr.open('POST', 'update_today_calendar.php', true)
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send();
                }
            </script>
            <div id="dayContainer" class="dateContainer">
                <table width="100%" height="100%">
                    <tr class="tableRows" id="headerRow">
                        <td class="firstRow"></td>
                        <td class="gapCol"></td>
                        <td class="lastRow"><?php echo date("l")?></td>
                    </tr>

                    <?php 
                        for ($i=8; $i <= 24; $i++){ 
                            $date=date("Y-m-d ");
                            $time=date('h:i A', strtotime("$i:00:00"));
                            $now=date('h:00 A');  
                            if($now==$time){
                                $line="
                                    <div id='lineCont'>
                                        <div id='circle'></div>
                                        <div id='line'></div>
                                    </div>
                                ";
                            }else{
                                $line="";
                            }
                            echo "
                                <tr class='tableRows'>
                                    <td class='firstRow'><p class='timePar'>$time</p></td>
                                    <td class='gapCol'>$line</td>
                                    <td class='lastRow' id='lastRow$i'>
                                        
                                    </td>
                                </tr>
                            ";
                            
                        }
                    ?>

                </table>
            </div>


            <script>
                function updateWeekCalendar(){
                    let xhr = new XMLHttpRequest();
                    xhr.onload=function(){
                        if(xhr.status==200){
                            if(xhr.responseText){
                                let data=JSON.parse(xhr.responseText);
                                // document.getElementById('searchCont').innerHTML="";
                                for(let i=3; i <= 9;i++){
                                    for (let k=8; k <= 24; k++){
                                        document.getElementById(`daysContentCont${i}`).innerHTML=""; 
                                    }
                                }
                                
                                let j=0;
                                for(let i=3; i <= 9;i++){
                                    for (let k=8; k <= 24; k++){
                                        document.getElementById(`daysContentCont${i}`).innerHTML+=`
                                        <div class='daysTasksCont' style='background-color:${data[j].color_list};'><p class='daysTaskpar'>${data[j].name_task}</p></div>
                                        `;
                                        j++;
                                    }
                                }
                            }
                        }
                    }
                    xhr.open('POST', 'update_week_calendar.php', true)
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send();
                }
            </script>
            <div id="weekContainer" class="dateContainer">
                
                <?php
                    for ($i=8; $i <= 24; $i++){ 
                        $date=date("Y-m-d ");
                        $amORpm="AM";
                        $time=date('h:i A', strtotime("$i:00:00")); 
                        echo "<div class='clockCont'>$time</div>";
                    }
                    $days=array("MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN");
                    $m=0;
                    $style='';
                    $today=strtoupper(date("D"));
                    $c=3;
                    for($l=0; $l<9 ;$l++){
                        if($l<=1){
                            echo "<div class='emptyDivs'></div>";
                        }else{
                            if($today==$days[$m]){
                                $style="style='background-color:#EFEFEF;'";
                                $chosenOne=$c;
                            }else{
                                $style="";
                            }
                            echo "<div class='daysCont' id='divGrod$c' $style><p>$days[$m]</p></div>";
                            $m++;
                            $c++;
                        }
                    }
             
                    for($i=3; $i<=9; $i++){
                        echo "<div class='daysContentCont' id='daysContentCont$i' style='grid-column: $i;'></div>";
                    }
                    if(isset($chosenOne) && !empty($chosenOne)){                   
                            echo "<script>        
                                        document.getElementById('daysContentCont$chosenOne').style.backgroundColor='#EFEFEF';
                                        document.getElementById('daysContentCont$chosenOne').style.borderRadius='0 0 10px 10px';
                                </script>";
                    }
                    $firstDay=date("Y-m-d", strtotime("this week"));
                    $lastDay=date("Y-m-d", strtotime("next week -1 day"));
                    $start=date("d", strtotime($firstDay));
                    $last=date("d", strtotime($lastDay));
                ?>
                
                </div> 



                <script>
                function updateMonthCalendar(){
                    let xhr = new XMLHttpRequest();
                    xhr.onload=function(){
                        if(xhr.status==200){
                            if(xhr.responseText){
                                let data=JSON.parse(xhr.responseText);
                                for(let i=0; i<data.length; i++){
                                    document.getElementById(`monthCont${i}`).innerHTML=`
                                        <div class='dayNum'>${data[i][0]}</div>
                                        <div class='tasksRows' style='background-color:${data[i][1]};'></div>
                                        <div class='tasksRows' style='background-color:${data[i][2]};'></div>
                                        <div class='tasksRows' style='background-color:${data[i][3]};'></div>
                                    `;
                                }  
                            }
                        }
                    }
                    xhr.open('POST', 'update_month_calendar.php', true)
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send();
                }
            </script>
               <div id="monthContainer" class="dateContainer">
                <?php
                    for ($i=0; $i < 7; $i++) { 
                        echo "<div class='daysHeaders'>$days[$i]</div>";
                    }
                    for($i=0; $i<35; $i++){
                        echo "<div class='daysDivs' id='monthCont$i'></div>";
                    }
                ?>

                   
                </div>    
            </div>

        <script>
            let alreadyclicked="day";
            let time=['day', 'week', 'month'];

            function switchDate(id){
                document.getElementById(alreadyclicked).style.backgroundColor='white';
                document.getElementById(id).style.backgroundColor='#dddddd';

                document.getElementById(alreadyclicked+"Container").style.display='none';

                if(id=="day"){
                    document.getElementById(id+"Container").style.display='block';
                    document.getElementById('todayTitle').innerHTML="<?php echo date('d F Y') ?>";

                }else if(id=="week"){
                    document.getElementById(id+"Container").style.display='grid';
                    document.getElementById('todayTitle').innerHTML="<?php echo $start."-".$last." ".date('F Y') ?>";
                }else{
                    document.getElementById(id+"Container").style.display='grid';
                    document.getElementById('todayTitle').innerHTML="<?php echo date('F Y') ?>";
                }
                alreadyclicked=id;
            }

        </script>
            
    </div>
    
</body>
</html>
