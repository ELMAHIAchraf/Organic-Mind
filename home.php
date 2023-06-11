<?php session_start() ?>
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
    <script src="home.js" defer></script>
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
</head>
<body>
    <?php 
        if(isset($_SESSION) && !empty($_SESSION)){
            date_default_timezone_set('Africa/Casablanca');
            include('connexion.php');
            include('add_sticky_form.php');
            include('add_list_form.php');
            include('add_subtask_form.php');
            include('add_task_form.php');
            include("menu.php");
            include("today.php");
            include("upcoming.php");
            include("calendar.php");
            include("sticky_wall.php");
            include("list.php");
            include('search.php');
            include("task_menu.php");
        }
    ?>           
</body>
</html>