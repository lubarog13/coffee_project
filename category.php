<p>
<a href='http://localhost/rpm_web_project/main_page'>На главную</a>
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
    echo '<p>
    <form method="GET" >
    <select name="sort">
       <option value="" selected></option>
       <option value="order by food_price asc">По возрастанию цены</option>
       <option value="order by food_price desc">По убыванию цены</option>
    </select>
    <input type="hidden" name = "category" value='.$_GET['category'].' >
    <button type="submit">Ок</button>
    </form></p>';
    if(isset($_SESSION['login'])){
        if(!isset($_GET['sort'])) $_GET['sort'] = "";
    if(isset($_GET['category'])){
        $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
        $str = "SELECT * FROM food where food_type = '".$_GET['category']."' ".$_GET['sort'];
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
    else echo $_GET['category'];
    //else header("Location: main_page.php");
    }
    else header("Location: login.php");
?>