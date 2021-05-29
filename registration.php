<form method="POST">
Email: <input type="text" name="login"><br>
Имя: <input type="text", name="first_name"><br>
Пароль: <input type="text" name="password"><br>
Повторите пароль: <input type="text" name="password_d"><br>
<button type="submit">Зарегестрироваться</button>
<a href="login.php">Войти</a>
</form>
<?php
    if(isset($_POST['login'], $_POST['password'], $_POST['password_d'], $_POST['first_name'])){
        if($_POST['password']==$_POST['password_d']){
            $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
            $str = "SELECT * FROM users where login = '".$_POST['login']."'";
            $result = $mysqli->query($str);
            if($row = $result->fetch_assoc()) echo "Запись уже существует";
            else{
            $str = "INSERT INTO users(login, username, password) VALUES ("."'".$_POST['login']."'".", '".$_POST['first_name']."', '".$_POST['password']."')";
            session_start();
            $mysqli->query($str);
            $_SESSION['login']=$_POST['login'];
            $_SESSION['first_name'] = $_POST['first_name'];
            $_SESSION['password'] = $_POST['password'];
            }
            $mysqli->close();
        }
        else echo "Пароли не совпадают";
    }
    else echo "Введите все поля";
?>