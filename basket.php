<?php
session_start();
    if(isset($_SESSION['login'])){
        $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
        $str = "SELECT * FROM goods join food on food.idfood=goods.idfood where choice='cart' and users_login ='".$_SESSION['login']."'";
        $result = $mysqli->query($str);
        while ($row = $result->fetch_assoc()){
            echo "<div onclick=".'"window.location.href = '."'http://localhost/rpm_web_project/product.php?idfood=".$row['idfood']."'".'">'.
            "<p><b>".$row['food_name']."</p></b>".
            "<p><img src=images/".$row['photo_link']." width='100' height='150'>".
            "<p>".$row['food_price']."руб.</p></div>";
        }
        $mysqli->close();
    }
    else header("Location: login.php");
?>
<button type="button">Заказать</button>