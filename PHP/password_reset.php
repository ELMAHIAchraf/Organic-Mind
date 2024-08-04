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
        body {
            background-color: #fafafa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 97vh;
        }

        #containerF {
            width: 1030px;
            height: 600px;
            display: flex;
            justify-content: space-between;
        }

        h1,
        span,
        p,
        input,
        textarea,
        label,
        button,
        h1,
        div {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }

        img {
            width: 500px;
            height: 600px;
            border-radius: 15px;
        }

        #formDivF {
            border: 1px solid #e6e6e6;
            border-radius: 15px;
            width: 500px;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #formSubDivF {
            width: 400px;
        }

        #HeaderF {
            font-size: 40px;
            font-weight: bold;
            color: #2c2c2c;
            margin-top: -20px;
            margin-left: 5px;
        }

        #Par1F {
            font-size: 15px;
            font-weight: 500;
            color: #484848;
            margin-top: -15px;
        }

        #Par2F,
        #forgotPw {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #484848;
            cursor: pointer;
            width: 200px;
            margin-left: 110px;
        }

        #Par2F:hover,
        #forgotPw:hover {
            text-decoration: underline;
        }

        #forgotPw {
            margin-top: -5px;
        }

        #Par {
            font-size: 15px;
            font-weight: 500;
            color: #484848;
            margin-top: -15px;
        }

        #ButtF {
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

        .taskNameTF {
            border: 1px solid #e6e6e6;
            border-radius: 8px;
        }

        .inputsF {
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

        #passwordC1,
        #passwordC2 {
            margin-bottom: 10px;
        }

        #passwordC1 {
            margin-top: -5px;
        }
    </style>
</head>

<body>
    <?php include("notification code.php"); ?>
    <div id="forgottenPw">
        <div id="containerF">
            <img src="../Static/image2.png" alt="">
            <div id="formDivF">
                <div id="formSubDivF">
                    <h1 id="HeaderF">Reset your password</h1>
                    <p id="Par">Please enter your new password and confirm it below.</p>
                    <div class="taskNameTF" id="passwordC1">
                        <input class="inputsF" id="password" oninput="passwordConfirmation()" type="password" placeholder="Password" require>
                    </div>
                    <div class="taskNameTF" id="passwordC2">
                        <input class="inputsF" id="passwordConf" oninput="passwordConfirmation()" type="password" placeholder="Password confirmation" require>
                    </div>
                    <button id="ButtF" onclick="updatePw()" disabled>Submit</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let token = "<?php if (isset($_GET['token']) && !empty($_GET['token'])) echo $_GET['token'] ?>";

        function updatePw() {
            let password = document.getElementById('password').value;
            let xhr = new XMLHttpRequest();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    if (xhr.response == 1) {
                        notify('Your password has been successfully reset. You may now log in with your new password.');
                        document.getElementById('ok').addEventListener('click', function() {
                            window.open('http://localhost/todo_list/PHP/project.php', '_self');
                        });
                    } else if (xhr.response == 2) {
                        notify('Sorry, we were unable to reset your password. Please try again later.')
                    } else {
                        notify('The password reset link has expired. Please request a new password reset to proceed.')
                    }
                }
            }
            xhr.open('POST', 'update_password.php', true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("token=" + token + "&password=" + password);
        }

        function passwordConfirmation() {
            let pw = document.getElementById('password').value;
            let pwCon = document.getElementById('passwordConf').value;
            if (pw != '' && pwCon != '' && pw == pwCon) {
                document.getElementById('ButtF').style.backgroundColor = '#ffd630';
                document.getElementById('ButtF').removeAttribute('disabled');
            } else {
                document.getElementById('ButtF').style.backgroundColor = '#ffdf5c';
                document.getElementById('ButtF').setAttribute('disabled', 'disabled');
            }

        }
    </script>
</body>

</html>