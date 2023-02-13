<?
    require './header.php';
    $website_title = 'Админ Панель - Сделано Молодежью';
    require './head.php';
?>
<body>
<div class="wrapper_admin">
    <div class="admin_page">
        <?require 'admin_menu_left.php'?>

        <div class="right_side_block_admin">
            <div class="users_list">
                <table>
                    <tr>
                        <th>Аватарка</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Баланс</th>
                        <th>Почта</th>
                        <th>Действие</th>
                    </tr>
                    <?
                        require '../vendor/connect.php';
                        $sql = 'SELECT * FROM `users`';
                        $query = $pdo->prepare($sql);
                        $query->execute();

                        foreach($query as $user_e){
                            ?>
                            <tr>
                                <td><img src=".<?=$user_e['img']?>" alt="" width='50px'></td>
                                <td><?=$user_e['name']?></td>
                                <td><?=$user_e['surname']?></td>
                                <td><?=$user_e['balance']?></td>
                                <td><?=$user_e['email']?></td>
                                <td>
                                    <a href="./edit_user.php?id=<?=$user_e['id']?>">Подробнее</a>
                                </td>
                            </tr>
                            <?
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>