<?php

function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
} 

$link=mysqli_connect("localhost", "root", "", "modul27"); 
if(isset($_POST['submit']))
{
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query); 
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        $hash = md5(generateCode(10));
 
        if(!empty($_POST['not_attach_ip']))
        {
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        } 
        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'"); 
        setcookie("id", $data['user_id'], time()+60*60*24*30, "/");
        setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true); // httponly !!! 
        header("Location: check"); exit();
    }
    else
    {
        print "Неверный логин или пароль";
    }
}
?>
<div class="container"> 
    <h1>Авторизация пользователя</h1>
    <form method="POST">
        <div class="row" style="padding: 20px 0px">
            <div class="col">
                Логин <input name="login" type="text" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                Пароль <input name="password" type="password" required><br> 
            </div>
        </div>
        <div class="row" style="padding: 20px 0px">
            <div class="col">
                <input type="checkbox" name="not_attach_ip">
            </div>
        </div>
        <div>
            <input name="submit" type="submit" value="Войти" class="btn btn-primary">
        </div>
    </form>
</div>




