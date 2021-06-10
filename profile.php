<form method="GET">
<button type="submit" name="logout">Выйти</button>
</form>
<?php
session_start();
    if(isset($_GET['logout'])){
        session_destroy();
        header("Location: login.php");
    }
    elseif(isset($_SESSION['login'])){
        $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
        echo "<h1>Здравствуйте, ".$_SESSION['first_name']."!</h1>";
        $str = "SELECT * FROM orders join food on food.idfood=orders.idfood where user ='".$_SESSION['login']."'";
        $result = $mysqli->query($str);
        if(isset($result)){
        echo "<h2>Ваш заказ:</h2>";
        while ($row = $result->fetch_assoc()){
            echo "<div onclick=".'"window.location.href = '."'http://localhost/rpm_web_project/product.php?idfood=".$row['idfood']."'".'">'.
            "<p><b>".$row['food_name']."</p></b>".
            "<p><img src=images/".$row['photo_link']." width='100' height='150'>".
            "<p>".$row['food_price']."руб.</p>"."</div>";
        }
        $mysqli->close();
    }
    }
    else header("Location: login.php");
?>
<p>
<a href='http://localhost/rpm_web_project/main_page.php'>На главную</a></p><p>
<a href='http://localhost/rpm_web_project/category.php?category=tea'>Чай</a></p><p>
<a href='http://localhost/rpm_web_project/category.php?category=coffee'>Кофе</a></p><p>
<a href='http://localhost/rpm_web_project/category.php?category=other'>Другое</a></p><p>
<a href = 'http://localhost/rpm_web_project/basket.php'>Корзина</a></p><p>
<a href = 'http://localhost/rpm_web_project/chosen.php'>Избранное</a>
</p>