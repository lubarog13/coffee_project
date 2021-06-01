<?php
    session_start();
    if(isset($_SESSION['login'])){
        $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
        $str = "SELECT * FROM food WHERE idfood=".$_GET['idfood'];
        $result = $mysqli->query($str);
        $row = $result->fetch_assoc();
        if($row!=null){
            echo "<h1>".$row['food_name']."</h1>".
            "<p><img src=images/".$row['photo_link']." width='100' height='150'>".
            "<h2>".$row['food_price']."руб.</h2>"."<p>Количество: ".$row['food_count'].
            "<h3>Описание</h3><p>".file_get_contents("C:\\xampp\\htdocs\\rpm_web_project\\documents\\".$row['long_description_link']).
            "</p><p>Поставщик: ".$row['provider_name']."</p>";
        }
    }
    else header("Location: login.php");
?>