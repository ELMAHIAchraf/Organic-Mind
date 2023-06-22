<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <style>
        #transparent-bgd{
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.750);
            position: fixed;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 100;
            top: 0;
            /* margin-top: -12.3vh; */
        }
        #notification-div{
            width: 450px;
            height: auto;
            background-color: white;
            border-radius: 10px;
            padding: 10px;
            padding-bottom: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column
        }
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');
        #message{
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 500;
            font-size: 20px;
            text-align: center;
            color: #4d4d4d;
        }
        #ok{
            border: none;
            padding: 5px 30px;
            font-size: 16px;
            font-weight: bold;
            color: #484848;
            cursor: pointer;
            background-color: #ffd630;  
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div id="transparent-bgd" onclick="hideNotification()">
        <div id="notification-div">
            <p id="message">
            </p>
            <button id="ok" onclick="hideNotification()">OK</button>
        </div>
        </div>
        <style>
        </style>
        <script>
            function hideNotification(){
                if(event.target.id=='transparent-bgd' || event.target.id=='ok'){
                    document.getElementById('transparent-bgd').style.display="none";
                    if(document.getElementById("signup") && document.getElementById("signup").style.display=="flex"){
                        document.getElementById("signup").style.display="none";
                        document.getElementById("login").style.display="flex";
                    }
                }
            }
            function notify(messageContent){
                document.getElementById('message').innerHTML=messageContent;
                document.getElementById('transparent-bgd').style.display="flex";

            }
        </script>
</body>
</html>
   
    
    