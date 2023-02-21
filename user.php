<?
    require_once './layout/header.php';
    $website_title = 'Личный кабинет - Сделано Молодежью';
    require_once './layout/head.php';
    if (empty($_SESSION['id'])) {
        ?>
        <h1 style="text-align: center;">Страница доступна только авторизованным пользователям</h1>
        <h2 style="text-align: center;"><a href="./auth.php" style='color: white;'>Авторизация</a></h2>
        <?
        exit();
    } else {
        require_once './vendor/user_info_from_bd.php';
?>
<body>
    <div class="user_block">
        <div class="frst_user_block">
            <img src="<?=$user['img']?>" alt="" width="240px">
        </div>

        <div class="sec_user_block">
            <h1>Личные данные</h1>
            <p>Имя фамилия: <?= $user['name'].' '.$user['surname']?></p>
            <?
                if ($user['bth_day'] == '1975-12-12') {
                    ?>
                    <p>День рождения: Нет</p>
                    <?
                } else {
                    ?>
                    <p>День рождения: <?=$user['bth_day']?></p>
                    <?
                }
                
            ?>
            <p>Телефон: <?=$user['tel']?></p>
            <p>Почта: <?= $user['email']?></p>
            <div class="a_block">
                <a href="#">изменить</a>
            </div>
        </div>

        <div class="thrd_user_block">
            <table>
                <tr>
                    <th>наименование товара</th>
                    <th>статус заказа</th>
                    <th>цена</th>
                    <th>дата заказа</th>
                </tr>

                <?
                
                $sql = "SELECT * FROM `buy_list` WHERE `id_user_buyer` = :id ORDER BY `id` DESC LIMIT 6";
                $query = $pdo->prepare($sql);
                $query -> execute(['id' => $user['id']]);
            
                foreach($query as $buy){
                    $sql = 'SELECT * FROM `catalog` WHERE `id` = :id';
                    $query = $pdo->prepare($sql);
                    $query->execute(['id' => $buy['id_product_buyed']]);

                    foreach($query as $product){
                        ?>
                        <tr>
                            <td><?=$product['title']?></td>
                            <td>
                                <?
                                if ($buy['status'] == 0) {
                                    echo 'В обработке';
                                } else if ($buy['status'] == 1) {
                                    echo 'Готов к выдаче';
                                } else {
                                    echo 'Выдан';
                                }
                                
                                ?>
                            </td>
                            <td><?=$buy['price']?></td>
                            <td><?=$buy['date']?></td>
                        </tr>
                        <?
                    }
                    ?>
                    <?
                }
                
                ?>
            </table>

            <div class="balance_user">
                <h2><?=$user['balance']?></h2>
                <p>бонусов</p>
            </div>
        </div>
    </div>
<?}
require './layout/footer.php'
?>
</body>
</html>