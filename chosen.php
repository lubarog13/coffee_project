<p>
<a href='http://localhost/rpm_web_project/main_page.php'>На главную</a>
<a href='http://localhost/rpm_web_project/category.php?category=tea'>Чай</a>
<a href='http://localhost/rpm_web_project/category.php?category=coffee'>Кофе</a>
<a href='http://localhost/rpm_web_project/category.php?category=other'>Другое</a>
<a href = 'http://localhost/rpm_web_project/basket.php'>Корзина</a>
<a href = 'http://localhost/rpm_web_project/chosen.php'>Избранное</a>
<form method="GET" action="main_page.php">
    Поиск: <input type="text" name='key_world'>
    <button type="submit">Search</button></form>
 </p>
<?php
session_start();
    if(isset($_SESSION['login'])){
        $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
        $str = "SELECT * FROM goods join food on food.idfood=goods.idfood where choice='chosen' and users_login ='".$_SESSION['login']."'";
        $result = $mysqli->query($str);
        while ($row = $result->fetch_assoc()){
            echo "<div onclick=".'"window.location.href = '."'http://localhost/rpm_web_project/product.php?idfood=".$row['idfood']."'".'">'.
            "<p><b>".$row['food_name']."</p></b>".
            "<p><img src=images/".$row['photo_link']." width='100' height='150'>".
            "<p>".$row['food_price']."руб.</p></div><button type='button' onclick=".'"window.location.href = '."'http://localhost/rpm_web_project/insert.php?idfood=".$row['idfood']."&choice=cart'".'">В корзину</button>';
        }
        $mysqli->close();
    }
    else header("Location: login.php");
?>