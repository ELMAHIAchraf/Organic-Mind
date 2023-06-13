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
    <title>Document</title>
    <style>
       #forgottenPw{
            background-color: #fafafa;
            justify-content: center;
            align-items: center;
            height: 97vh;
            display: none;
        }
        #containerF{
            width: 1030px;
            height: 600px;
            display: flex;
            justify-content: space-between;
        }
        h1, span, p, input, textarea, label, button, h1, div{
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }
        img{
            width: 500px;
            height: 600px;
            border-radius: 15px;
        }
        #formDivF{
            border: 1px solid #e6e6e6;
            border-radius: 15px;
            width: 500px;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #formSubDivF{
            width: 400px; 
        }
        #HeaderF{
            font-size: 40px;
            font-weight: bold;
            color: #2c2c2c;
            margin-top: -20px;
            margin-left: 5px;
        }
        #Par1F{
            font-size: 15px;
            font-weight: 500;
            color: #484848;
            margin-top: -15px;
        }
        #Par2F, #forgotPw{
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #484848;
            cursor: pointer;
            width: 200px;
            margin-left: 110px;
        }
        #Par2F:hover, #forgotPw:hover{
            text-decoration: underline;
        }
        #forgotPw{
            margin-top: -5px;
        }
        #Par{
            font-size: 15px;
            font-weight: 500;
            color: #484848;
            margin-top: -15px;
        }
        #ButtF{
            border: none;
            width: 400px;
            height: 40px;
            font-size: 15px;
            font-weight: bold;
            color: #2a2a2a;
            cursor: pointer;
            background-color: #ffd630;  
            border-radius: 6px;
        }
        .taskNameTF{
            border: 1px solid #e6e6e6;
            border-radius: 8px;
        }
        .inputsF{
            background-color: transparent;
            border: none;
            outline: none;
            width: 340px;
            height: 40px;
            font-size: 14px;
            font-weight: 500;
            padding-left: 20px;
            color: #484848;
        }
        #emailContF{
            margin-bottom: 10px;
            margin-top: -10px;
        }
        #FFail{
            color: red;
            font-size: 14px;
            margin-left: 80px;
            display: none;
        }
        #ParF{
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #484848;
            cursor: pointer;
            width: 200px;
            margin-left: 100px;
        }
        #ParF:hover{
            text-decoration: underline;
        }
        #load{
            display: none;
        }
    </style>
</head>
<body>
    <div id="forgottenPw">
    <div id="containerF">
        <img src="image2.png" alt="">
        <div id="formDivF">
            <div id="formSubDivF">
                    <h1 id="HeaderF">Reset your password</h1>
                    <p id="Par">Please enter your email address so we can send you a password reset link.</p>
                    <div class="taskNameTF" id="emailContF">
                        <input class="inputsF" id="emailF"  type="email" placeholder="Email" require>
                    </div>
                    <p id="FFail">Email address not found in our records</p>
                    <button id="ButtF" onclick="recoverPwd()">Submit &nbsp;<i id="load" class="fa-duotone fa-spinner-third fa-spin"></i></button>
                    <p id="ParF" onclick="openLogin3()">Back to Login</p>
            </div>
        </div>
    </div>
    </div>
    <script>
    function recoverPwd(){
        document.getElementById("FFail").style.display="none"; 
        document.getElementById('load').style.display="inline-block";

        let email=document.getElementById('emailF').value;
        let xhr = new XMLHttpRequest();
        xhr.onload=function(){
            if(xhr.status==200){
                if(xhr.responseText==1){
                    notify(`Email sent successfully to ${email}`);
                }else if(xhr.responseText==2){
                    document.getElementById("FFail").style.display="block"; 
                }else{
                    notify("We're sorry, but the email could not be sent at this time. Please try again later.");
                }
                
                document.getElementById('load').style.display="none";
            }
        }
        xhr.open('POST', 'send_email.php', true)
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("email="+email);
    }
    function openLogin3(){
        document.getElementById("login").style.display="flex";
        document.getElementById("forgottenPw").style.display="none";
    }
    </script>
</body>
</html>