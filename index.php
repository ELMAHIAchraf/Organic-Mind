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
        #index{
            background-color: #fafafa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 97vh;
        }
        #containerInd{
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
        #formDivInd{
            border: 1px solid #e6e6e6;
            border-radius: 15px;
            width: 500px;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #formSubDivInd{
            width: 420px;           
        }
        #HeaderInd{
            font-size: 45px;
            font-weight: bold;
            color: #2c2c2c;
        }
        #Par1Ind{
            font-size: 15px;
            font-weight: 500;
            color: #484848;
            margin-top: -15px;
        }
        #Par2Ind{
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #484848;
            cursor: pointer;
            width: 220px;
            margin-left: 100px;
        }
        #Par2Ind:hover{
            text-decoration: underline;
        }
        #ButtInd{
            border: none;
            width: 420px;
            height: 40px;
            font-size: 15px;
            font-weight: bold;
            color: #2a2a2a;
            cursor: pointer;
            background-color: #ffd630;  
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div id="index">
    <div id="containerInd">
        <img src="image.png" alt="">
        <div id="formDivInd">
            <div id="formSubDivInd">
                <h1 id="HeaderInd">Productive Mind</h1>
                <p id="Par1Ind">
                    With only the features you need, Organic Mind is customized
                    for individuals seeking a stress-free way to stay focused on
                    their goals, projects, and tasks.
                </p>
                <button id="ButtInd" onclick="openSignup()">Get Started</button>
                <p id="Par2Ind" onclick="openLogin()">Already have an account? Sign in</p>
            </div>
        </div>
    </div>
    <script>
        function openSignup(){
            document.getElementById("index").style.display="none";
            document.getElementById("signup").style.display="flex";
        }
        function openLogin(){
            document.getElementById("index").style.display="none";
            document.getElementById("login").style.display="flex";
        }
    </script>
    </div>
</body>
</html>