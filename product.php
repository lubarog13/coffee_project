<p><a href='http://localhost/rpm_web_project/profile.php'>Профиль</a></p>
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
        $str = "SELECT * FROM food WHERE idfood=".$_GET['idfood'];
        $result = $mysqli->query($str);
        $row = $result->fetch_assoc();
        if($row!=null){
            echo "<h1>".$row['food_name']."</h1>".
            "<p><img src=images/".$row['photo_link']." width='100' height='150'>".
            "<h2>".$row['food_price']."руб.</h2>"."<p>Количество: ".$row['food_count'].
            "<h3>Описание</h3><p>".file_get_contents("C:\\xampp\\htdocs\\rpm_web_project\\documents\\".$row['long_description_link']).
            "</p><p>Поставщик: ".$row['provider_name']."</p><button onclick=".'"window.location.href = '."'http://localhost/rpm_web_project/insert.php?idfood=".$row['idfood']."&choice=cart'".'">В корзину</button>'."<button onclick=".'"window.location.href = '."'http://localhost/rpm_web_project/insert.php?idfood=".$row['idfood']."&choice=chosen'".'">В избранное</button>';
        }
    }
    else header("Location: login.php");
?>