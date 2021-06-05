<p>
<a href='http://localhost/rpm_web_project/main_page.php'>На главную</a>
<a href='http://localhost/rpm_web_project/category.php?category=tea'>Чай</a>
<a href='http://localhost/rpm_web_project/category.php?category=coffee'>Кофе</a>
<a href='http://localhost/rpm_web_project/category.php?category=other'>Другое</a>
<a href = 'http://localhost/rpm_web_project/basket.php'>Корзина</a>
<a href = 'http://localhost/rpm_web_project/chosen.php'>Избранное</a>
<form method="GET">
    Поиск: <input type="text" name='key_world'>
    <button type="submit">Search</button></form>
 </p>
<?php
session_start();
    if(isset($_SESSION['login'])){
        if(!isset($_GET['sort'])) $_GET['sort'] = "";
        if(isset($_GET['key_world'])){
            echo ' <p>
            <form>
            <select name="sort">
               <option value="" selected></option>
               <option value="order by food_price asc">По возрастанию цены</option>
               <option value="order by food_price desc">По убыванию цены</option>
            </select>
            <input name="key_world" type="hidden" value='.$_GET['key_world'].'>
           <button type="submit">Ок</button>
           </form></p>';
            $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
            $str = $str = "SELECT * from food where short_description like '%".$_GET['key_world']."%'  union SELECT * from food where food_name like '%".$_GET['key_world']."%'  union SELECT * from food where provider_name like '%".$_GET['key_world']."%' ".$_GET['sort'].";";
            $result = $mysqli->query($str);
            echo "<h1>Результаты поиска</h1>";
            while ($row = $result->fetch_assoc()){
                echo "<div onclick=".'"window.location.href = '."'http://localhost/rpm_web_project/product.php?idfood=".$row['idfood']."'".'">'.
                "<p><b>".$row['food_name']."</p></b>".
                "<p><img src=images/".$row['photo_link']." width='100' height='150'>".
                "<p>".$row['food_price']."руб.</p>".
                "<p>".$row['provider_name']."</p>".
                "<p>".$row['short_description']."</p></div>";
            }
        $result->free();
        $mysqli->close(); 
        }
        else{
            echo ' <p>
            <form>
            <select name="sort">
               <option value="" selected></option>
               <option value="order by food_price asc">По возрастанию цены</option>
               <option value="order by food_price desc">По убыванию цены</option>
            </select>
           <button type="submit">Ок</button>
           </form></p>';
        $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
        $str = $str = "SELECT * FROM food ".$_GET['sort'];;
        $result = $mysqli->query($str);
        while ($row = $result->fetch_assoc()){
            echo "<div onclick=".'"window.location.href = '."'http://localhost/rpm_web_project/product.php?idfood=".$row['idfood']."'".'">'.
            "<p><b>".$row['food_name']."</p></b>".
            "<p><img src=images/".$row['photo_link']." width='100' height='150'>".
            "<p>".$row['food_price']."руб.</p>".
            "<p>".$row['provider_name']."</p>".
            "<p>".$row['short_description']."</p></div>";
        }
        $result->free();
        $mysqli->close();
    }
    }
    else header("Location: login.php");
?>