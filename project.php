<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        window.open("http://localhost/todo%20list/home.php", "_self");
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
    </script>
</body>
</html>