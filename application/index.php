<?php
global $link, $user;
require_once "../linkBd.php";
include_once "../view/header.php";
$categorys_appl=$link->query("SELECT * FROM `category_application`");
$applications=$link->query("SELECT * FROM `application`");
?>

<main class="py-5">
    <section >
        <div class="container">
            <div class="card border-black mx-auto p-3" style="max-width: 600px">
                <h3 class="d-flex justify-content-center">Создание товара</h3>
                <form action="/controller/application/create.php" class=" d-flex flex-column gap-2" method="post" enctype="multipart/form-data">
                    <input  type="text" name="name" placeholder="Имя клиента" class="form-control">
                    <?php if(isset($_SESSION['error_application']['name_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_application']['name_error']?></p>
                    <?php endif;?>
                    <input type="text" name="sur_name" placeholder="Фамилия клиента" class="form-control">
                    <?php if(isset($_SESSION['error_application']['sur_name_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_application']['sur_name_error']?></p>
                    <?php endif;?>
                    <input type="tel" name="phone" placeholder="Номер телефона клиента" class="form-control">
                    <?php if(isset($_SESSION['error_application']['phone_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_application']['phone_error']?></p>
                    <?php endif;?>
                    <input type="text" name="brand" placeholder="Бренд техники" class="form-control">
                    <?php if(isset($_SESSION['error_application']['brand_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_application']['brand_error']?></p>
                    <?php endif;?>
                    <input type="text" name="model" placeholder="Модель техники" class="form-control">
                    <?php if(isset($_SESSION['error_application']['model_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_application']['model_error']?></p>
                    <?php endif;?>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Описание проблемы"></textarea>
                    <?php if(isset($_SESSION['error_application']['description_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_application']['description_error']?></p>
                    <?php endif;?>
                    <select name="category_id" class="form-select">
                        <?php foreach ($categorys_appl as $category):?>
                            <option value="<?= $category["id"]?>">
                                <?= $category["name"]?>
                            </option>
                        <?php endforeach;?>
                    </select>
<!--                    <div>-->
<!--                        <label for="form_file" class="form-label">Фото проблемы</label>-->
<!--                        <input class="form-control " type="file" name="img[]" id="form_file" multiple>-->
<!--                    </div>-->
                    <input type="submit" class="btn btn-primary" name="reg_appli">
                </form>
            </div>
        </div>
    </section>


    <section class="py-5">
        <table class="table">
            <thead>
            <tr>
                <th>Номер заявки</th>
                <th>Имя клиента</th>
                <th>Фамилия клиента</th>
                <th>Номер телефона клиента</th>
                <th>Описание проблемы</th>
                <th>Бренд техники</th>
                <th>Модель техники</th>
                <th>Категория техники</th>
                <th>Дата создания заявки</th>
                <th>Изменения заявки</th>
                <th>Редактировать</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($applications as $application):?>
<!--                --><?php //$images=$link->query("SELECT * FROM `img_application` where application_id='$application[id]'")->fetch_all(ASSERT_ACTIVE)?>
                <?php $category=$link->query("SELECT * FROM `category_application` where id='$application[category_id]'")->fetch_array(ASSERT_ACTIVE)?>
                <tr>
                    <td><?=$application["id"]?></td>
                    <td><?=$application["name"]?></td>
                    <td><?=$application["sur_name"]?></td>
                    <td><?=$application["phone"]?></td>
                    <td><?=$application["description"]?></td>
                    <td><?=$application["brand"]?></td>
                    <td><?=$application["model"]?></td>
                    <?php if ($application['category_id'] >=1 ):?>
                        <td><?=$category['name']?></td>
                    <?php else:?>
                        <td>У заявки нет категории</td>
                    <?php endif;?>
                    <td><?=$application["create_at"]?></td>
                    <td><?=$application["update_at"]?></td>
                    <td><a href="/update_prod/?application_id=<?=$application["id"]?>">Изменить</a></td>
                    <td><a href="/controller/application/dalete.php?application_id=<?=$application["id"]?>">Удалить</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </section>
</main>

<?php
unset($_SESSION['error_application']);
?>