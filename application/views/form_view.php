<?php
$link=mysqli_connect("localhost", "root", "", "modul27"); 
if(isset($_POST['submit']))
{
    $err = [];
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Недопустимые символы ";
    } 
    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен содержать меньше 30 символов";
    } 

    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Данный логин занят";
    } 

    if(count($err) == 0)
    {
        $login = $_POST['login'];
        $password = md5(md5(trim($_POST['password']))); 
        mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."'");
        header("Location: log"); exit();
    }
    else
    {
        print "<b>Ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
?> 

<div class="container"> 
    <h1>Регистрация пользователя</h1>
    <form method="POST">
        <div class="row" style="padding-top: 20px">
            <div class="col">
                Логин <input name="login" type="text" required><br>
            </div>
        </div>
        <div class="row" style="padding: 20px 0px">
            <div class="col">
                Пароль <input name="password" type="password" required><br> 
            </div>
        </div>
        <div>
            <input name="submit" type="submit" class="btn btn-primary" value="Зарегистрироваться">
        </div>
    </form>
</div>



