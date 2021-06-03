<?php

session_start();
    if(isset($_SESSION['login'])){
        if(isset($_GET['idfood'], $_GET['choice'])){
        $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
        $str = "INSERT INTO goods VALUES (default, "."'".$_GET['choice']."'".", '".$_SESSION['login']."', ".$_GET['idfood'].")";
        $mysqli->query($str);
        $mysqli->close();
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    else header("Location: main_page.php");
    }
    else header("Location: login.php");
?>