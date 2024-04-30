<?php
global $link, $user;
require_once "../linkBd.php";
include_once "../view/header.php";
if (empty($user)){
    header('Location: /registration');
}
?>


<main class="py-5">
    <div class="container">
        <div class="card p-4 border-black rounded-4  mx-auto" style="max-width: 600px">
            <div class="d-flex flex-column gap-3 mx-auto">
                    <h3 class="text-dark "><?=$user['name']?> <?=$user['sur_name']?></h3>
            </div>
            <div class="text-dark d-flex flex-column mx-auto">
                <p class="fs-4">Логин: <?=$user["login"]?></p>
                <div class="d-flex flex-wrap mt-3 input-group-lg gap-3 mx-auto">
                    <a href="/controller/user/exit.php" class="btn btn-danger rounded-4">Выйти</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
unset($_SESSION['error_up']);
include_once "../view/footer.html"
?>
