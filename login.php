<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       #login{
            background-color: #fafafa;
            justify-content: center;
            align-items: center;
            height: 97vh;
            display: none;
        }
        #containerLog{
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
        #formDivLog{
            border: 1px solid #e6e6e6;
            border-radius: 15px;
            width: 500px;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #formSubDivLog{
            width: 400px; 
        }
        #HeaderLog{
            font-size: 40px;
            font-weight: bold;
            color: #2c2c2c;
            margin-top: -20px;
            margin-left: 5px;
        }
        #Par1Log{
            font-size: 15px;
            font-weight: 500;
            color: #484848;
            margin-top: -15px;
        }
        #Par2Log, #forgotText{
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #484848;
            cursor: pointer;
            width: 200px;
            margin-left: 100px;
        }
        #Par2Log:hover, #forgotText:hover{
            text-decoration: underline;
        }
        #forgotText{
            margin-top: -5px;
            margin-left: 103px;
        }
        #ButtLog{
            border: none;
            width: 400px;
            height: 40px;
            font-size: 15px;
            font-weight: bold;
            color: #2a2a2a;
            cursor: pointer;
            background-color: #ffd630;  
            border-radius: 6px;
            margin-top: 10px;
        }
        .taskNameTLog{
            border: 1px solid #e6e6e6;
            border-radius: 8px;
        }
        .inputsLog{
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
        #eyeLog{
            color: #696969;
            font-size: 14px;
            cursor: pointer;
        }
        #emailContLog{
            margin-bottom: 10px;
            margin-top: -10px;
        }
        #loginFail{
            color: red;
            font-size: 14px;
            margin-left: 110px;
            display: none;
        }
    </style>
</head>
<body>
    <div id="login">
    <div id="containerLog">
        <img src="image2.png" alt="">
        <div id="formDivLog">
            <div id="formSubDivLog">
                    <h1 id="HeaderLog">Sign in</h1>
                    <div class="taskNameTLog" id="emailContLog">
                        <input class="inputsLog" id="emailLog"  type="email" placeholder="Email">
                    </div>
                    <div class="taskNameTLog">
                        <input class="inputsLog" id="passwordContLog"  type="password" placeholder="Password">
                        <i class="fa-solid fa-eye" id="eyeLog" onclick="showPassword()"></i>
                    </div>
                    <p id="loginFail">Incorrect email or password</p>
                    <button id="ButtLog" onclick="Login()">Sign in</button>
                    <p id="Par2Log" onclick="openSignup2()">Don't have an account? Sign up</p>
                    <p id="forgotText" onclick="openForgottenPw()">Forgot your password?</p>
            </div>
        </div>
    </div>
    </div>
    <script>
    let counter=1;
    function showPassword(){
        if(counter%2 != 0){
            document.getElementById('passwordContLog').setAttribute("type", "text");
            document.getElementById('eyeLog').setAttribute("class", "fa-solid fa-eye-slash");
        }else{
            document.getElementById('passwordContLog').setAttribute("type", "password");
            document.getElementById('eyeLog').setAttribute("class", "fa-solid fa-eye");
        }
        counter++;
    }
    function openSignup2(){
        document.getElementById("login").style.display="none";
        document.getElementById("signup").style.display="flex";
    }
    
    </script>
</body>
</html>