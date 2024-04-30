<?php
global $link;
require_once "../../linkBd.php";

$error = [];

$name = $_POST["name"];
$sur_name = $_POST["sur_name"];
$phone = $_POST["phone"];
$brand = $_POST["brand"];
$model = $_POST["model"];
$description = $_POST["description"];
$reg_appli = $_POST["reg_appli"];
$category_id = $_POST['category_id'];

if ($reg_appli) {
    if (empty($name)) $error["name_error"] = "Введите имя клиента";
    if (empty($sur_name)) $error["sur_name_error"] = "Введите фамилию клиента";
    if (empty($phone)) $error["phone_error"] = "Введите номер телефона клиента";
    if (empty($brand)) $error["brand_error"] = "Введите бренд техники";
    if (empty($model)) $error["model_error"] = "Введите модель техники";
    if (empty($description)) $error["description_error"] = "Введите описание проблемы";

    if ($error) {
        $_SESSION['error_application'] = $error;
        header('Location: /application/index.php');
        die();
    }
}

$link->query("INSERT INTO `application`(`name`, `sur_name`, `phone`,  `brand`,  `model`, `description`, `category_id`) VALUES ('$name','$sur_name','$phone','$brand','$model','$description','$category_id')");

header('Location: /application/index.php');