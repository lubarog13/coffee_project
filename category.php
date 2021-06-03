<p><a href='http://localhost/rpm_web_project/category.php?category=tea'>Чай</a>
<a href='http://localhost/rpm_web_project/category.php?category=coffee'>Кофе</a>
<a href='http://localhost/rpm_web_project/category.php?category=other'>Другое</a>
<a href = 'http://localhost/rpm_web_project/basket.php'>Корзина</a>
<a href = 'http://localhost/rpm_web_project/chosen.php'>Избранное</a>
 </p>

<?php

session_start();
    if(isset($_SESSION['login'])){
        if(isset($_GET['category'])){
        $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
        $str = "SELECT * FROM food where food_type = '".$_GET['category']."'";
        echo "<h2>".$_GET['category']."</h2>";
        $result = $mysqli->query($str);
        while ($row = $result->fetch_assoc()){
            echo "<div onclick=".'"window.location.href = '."'http://localhost/rpm_web_project/product.php?idfood=".$row['idfood']."'".'">'.
            "<p><b>".$row['food_name']."</p></b>".
            "<p><img src=images/".$row['photo_link']." width='100' height='150'>".
            "<p>".$row['food_price']."руб.</p>".
            "<p>".$row['short_description']."</p></div>";
        }
        $mysqli->close();
    }
    else header("Location: main_page.php");
    }
    else header("Location: login.php");
?>