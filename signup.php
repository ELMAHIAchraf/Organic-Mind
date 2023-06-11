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
       #signup{
            background-color: #fafafa;
            justify-content: center;
            align-items: center;
            height: 97vh;
            display: none;
        }
        #containerSign{
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
        #formDivSign{
            border: 1px solid #e6e6e6;
            border-radius: 15px;
            width: 500px;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #formSubDivSign{
            width: 400px; 
        }
        #HeaderSign{
            font-size: 40px;
            font-weight: bold;
            color: #2c2c2c;
            margin-top: -20px;
            margin-left: 5px;
        }
        #Par1Sign{
            font-size: 15px;
            font-weight: 500;
            color: #484848;
            margin-top: -15px;
        }
        #Par2Sign{
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #484848;
            cursor: pointer;
            width: 210px;
            margin-left: 95px;
        }
        #Par2Sign:hover{
            text-decoration: underline;
        }
        #ButtSign{
            border: none;
            width: 400px;
            height: 40px;
            font-size: 15px;
            font-weight: bold;
            color: #2a2a2a;
            cursor: pointer;
            background-color: #ffdf5c;  
            border-radius: 6px;
        }
        .taskNameTSign{
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .inputsSign{
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
        #eyeSign{
            color: #696969;
            font-size: 14px;
        }
        #emailContSign{
            margin-top: -10px;
        }
        #nameContSign{
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;

        }
        .nameInpSign{
            width: 193px;
            border: 1px solid #e6e6e6;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div id="signup">
    <div id="containerSign">
        <img src="image2.png" alt="">
        <div id="formDivSign">
            <div id="formSubDivSign">
                    <h1 id="HeaderSign">Sign up</h1>
                    <div id="nameContSign">
                        <div class="nameInpSign" >
                            <input class="inputsSign" id="Fname"  type="text" placeholder="First name" oninput="passwordConf()">
                        </div>
                        <div class="nameInpSign">
                            <input class="inputsSign" id="Lname"  type="text" placeholder="Last name" oninput="passwordConf()">
                        </div>
                    </div>
                    <div class="taskNameTSign" id="emailContSign">
                        <input class="inputsSign" id="emailSign"  type="email" placeholder="Email" oninput="passwordConf()">
                    </div>
                    <div class="taskNameTSign">
                        <input class="inputsSign" id="passwordContSign"  type="password" placeholder="Password" oninput="passwordConf()">
                        <i class="fa-solid fa-eyeSign" id="eyeSign"></i>
                    </div>
                    <div class="taskNameTSign">
                        <input class="inputsSign" id="passwordContConf"  type="password" placeholder="Confirm Password" oninput="passwordConf()">
                    </div>
                    <button id="ButtSign" onclick="Signup()"  disabled>Sign up</button>
                    <p id="Par2Sign" onclick="openLogin2()">Already have an account? Sign in</p>
            </div>
        </div>
    </div>
    </div>
    <script>
        function openLogin2(){
            document.getElementById("signup").style.display="none";
            document.getElementById("login").style.display="flex";
        }
        function passwordConf(){
            let fname=document.getElementById('Fname').value;
            let lname=document.getElementById('Lname').value;
            let email=document.getElementById('emailSign').value;
            let pw=document.getElementById('passwordContSign').value;
            let pwCon=document.getElementById('passwordContConf').value;
            if(fname!='' && lname!='' && email!='' && pw!='' && pwCon!='' && pw==pwCon){
                document.getElementById('ButtSign').style.backgroundColor='#ffd630';
                document.getElementById('ButtSign').removeAttribute('disabled');
            }else{
                document.getElementById('ButtSign').style.backgroundColor='#ffdf5c';
                document.getElementById('ButtSign').setAttribute('disabled', 'disabled');
            }

        }
    </script>
</body>
</html>