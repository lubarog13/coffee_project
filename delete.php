<?php

session_start();
    if(isset($_SESSION['login'])){
        if(isset($_GET['id_goods'])){
        $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
        $str = "DELETE from goods where id_goods =".$_GET['id_goods'];
        $mysqli->query($str);
        $mysqli->close();
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    else header("Location: main_page.php");
    }
    else header("Location: login.php");
?>