<?php
global $link;
if (isset($_SESSION['user_id'])) $user = $link->query("select * from user where id='$_SESSION[user_id]'")->fetch_array();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand bg-dark-subtle">
        <div class="container">
            <div class="justify-content-end fs-5 collapse navbar-collapse" >
                <ul class="navbar-nav menu-desktop" style="align-items: center">
                    <li>
                        <a href="/application/index.php" class="nav-link text-dark d-flex gap-3 link-hover-class" style="align-items: center">Создание заявки</a>
                    </li>
                    </li>
                    <?php if(empty($_SESSION['user_id'])):?>
                        <li class="nav-item"><a href="/login/index.php" class="nav-link text-dark">Вход</a></li>
                    <?php endif;?>
                    <?php if(isset($_SESSION['user_id'])):?>
                        <li class="nav-item">
                            <a href="/user/index.php" class="nav-link text-primary d-flex gap-3 link-hover-class" style="align-items: center">
                                <p style="margin-top: 16px;"><?=$user['name']?> <?=$user['sur_name']?></p>
                            </a>
                        </li>
                    <?php endif;?>
                </ul>
            </div>
		  </div>
    </nav>
</header>
