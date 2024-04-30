<?php
global $link;
require_once "../../linkBd.php";
$error = [];

$login = $_POST["login"];
$password = $_POST["password"];

$users_login = $link->query("select * from user where login='$login'")->fetch_array();

if ($_POST["logU"]){
    if (empty($login)) $error["login_error"]="Введите номер телефона";
    elseif (empty($users_login)) $error["login_log_error"]="Пользователь с таким номеров телефона не суеществует";
    if (empty($password)) $error["password_error"]="Введите Пароль";
    elseif (isset($users_login) && $users_login['password'] != $password) $error["password_log_error"]="Не верный пароль";

    if ($error) {
        $_SESSION['error_log'] = $error;
        header('Location: /login/index.php');
        die();
    }

    $_SESSION['user_id'] = $users_login['id'];
    header('Location: /login/index.php');
}
