<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        body{
            background-color: #f9f9f9;
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body id="project">
    <?php
        include("index.php");
        include("login.php");
        include("signup.php");
        include("forgotten pw.php");
        include("notification code.php");
    ?>
    <script>
        function Signup(){
            let Fname=document.getElementById("Fname").value;
            let Lname=document.getElementById("Lname").value;
            let email=document.getElementById("emailSign").value;
            let pwd=document.getElementById("passwordContSign").value;
            let passwordConf=document.getElementById("passwordContConf").value;
            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText==1){
                        notify("You signed up!");
                        
                    }else if(xhr.responseText==0){
                        notify("An error occured!");
                    }else{
                        notify('Sorry, the email address you have entered is already associated with an existing account. Please use a different email address or log in to your existing account.');
                    }
                }
            }
            xhr.open('POST', 'signup_user.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('Fname='+Fname+'&Lname='+Lname+'&email='+email+'&pwd='+pwd);
        }
        function Login(){
            let email=document.getElementById("emailLog").value;
            let pwd=document.getElementById("passwordContLog").value;
            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    if(xhr.responseText==1){
                        window.open("http://localhost/todo_list/home.php", "_self");
                    }else{
                        document.getElementById('loginFail').style.display='block';
                        document.getElementById('ButtLog').style.marginTop='0px';
                    }
                }
            }
            xhr.open('POST', 'login_user.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('email='+email+'&pwd='+pwd);
        }
        function openForgottenPw(){
            document.getElementById("login").style.display="none";
            document.getElementById("forgottenPw").style.display="flex"; 
        }
    </script>
</body>
</html>