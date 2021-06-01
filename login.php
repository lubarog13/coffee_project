<form method="POST">
Email: <input type="text" name="login"><br>
Пароль: <input type="text" name="password"><br>
<button type="submit" name="enter">Войти</button>
<a href="registration.php">Регистрация</a>
</form>

<?php
    if(isset($_POST['enter'])){
    session_start();
    $mysqli = new mysqli("localhost", "root", "1234", "rpm_project");
        if(isset($_POST['login'], $_POST['password'])){
            $str = "SELECT * FROM users where login = '".$_POST['login']."' and password='".$_POST['password']."'";
            $result = $mysqli->query($str);
            $row = $result->fetch_assoc();
            if($row != null){
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['first_name'] = $row['username'];
                $_SESSION['password'] = $_POST['password'];
                header("Location: main_page.php");
            }
            else echo "Проверьте email и пароль или зарегестрируйтесь";
        }
        else echo "Введите все поля";
    $mysqli->close();
    }
?>