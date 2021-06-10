<p><a href='http://localhost/rpm_web_project/profile.php'>Профиль</a></p>
<p>
<a href='http://localhost/rpm_web_project/main_page.php'>На главную</a>
<a href='http://localhost/rpm_web_project/category.php?category=tea'>Чай</a>
<a href='http://localhost/rpm_web_project/category.php?category=coffee'>Кофе</a>
<a href='http://localhost/rpm_web_project/category.php?category=other'>Другое</a>
<a href = 'http://localhost/rpm_web_project/basket.php'>Корзина</a>
<a href = 'http://localhost/rpm_web_project/chosen.php'>Избранное</a>
</p>
<form method="POST">
Введите ФИО: <input type="text" name="full_name"><br>
Адрес доставки: <input type="text", name="address"><br>
Телефон: <input type="text" name="telephone"><br>
<select name="pay_meth">
<option value="online">Онлайн</option>
<option value="ofline">Офлайн</option>
</select>
<button type="submit">Заказать</button>
<a href="basket.php">Назад</a>
</form>
<?php
    session_start();
    if(isset($_SESSION['login'])){
    if(isset($_POST['full_name'], $_POST['address'], $_POST['telephone'], $_POST['pay_meth'])){
            $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
            $str = "SELECT * FROM goods join food on food.idfood=goods.idfood where choice='cart' and users_login ='".$_SESSION['login']."'";
            $result = $mysqli->query($str);
            while($row = $result->fetch_assoc()){
            $str = "INSERT INTO orders(user, idfood, full_name, address, telephone, pay_meth) VALUES ("."'".$_SESSION['login']."', ".$row["idfood"].", '".$_POST['full_name']."', '".$_POST['address']
            ."', ".$_POST['telephone'].", '".$_POST['pay_meth']."')";
            $mysqli->query($str);
            $str = "DELETE from goods where id_goods =".$row['id_goods'];
            $mysqli->query($str);
            }
            echo "Заказ создан!";
            $mysqli->close();
        }
        else echo "Заполните поля";
    }
    else header("Location: login.php");
?>