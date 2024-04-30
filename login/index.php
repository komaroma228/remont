<?php
global $link;
require_once "../linkBd.php";
include_once "../view/header.php";
?>
    <main class="py-5">
        <div class="container">
            <div class="card p-4 border-dark rounded-4  mx-auto" style="max-width: 600px">
                <h4 class="mb-3 text-center text-dark">Войти</h4>
                <form class="d-flex flex-column input-group-lg gap-3 " action="../controller/user/login.php" method="post" enctype="multipart/form-data">
                    <input class="form-control" type="tel" name="login" placeholder="Введите логин">
                    <?php if(isset($_SESSION['error_log']['login_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_log']['login_error']?></p>
                    <?php endif;?>
                    <?php if(isset($_SESSION['error_log']['login_log_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_log']['login_log_error']?></p>
                    <?php endif;?>
                    <input class="form-control"  type="password" name="password" placeholder="Введите пароль">
                    <?php if(isset($_SESSION['error_log']['password_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_log']['password_error']?></p>
                    <?php endif;?>
                    <?php if(isset($_SESSION['error_log']['password_log_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_log']['password_log_error']?></p>
                    <?php endif;?>
                    <input type="submit" name="logU" value="Войти" class="btn btn-primary rounded-4">
                </form>
            </div>
        </div>
    </main>
    <style>
        #link:hover {
            opacity: .7;
        }
    </style>
<?php
unset($_SESSION['error_log']);
include_once "../view/footer.html"
?>