<?
    require './header.php';
    $website_title = 'Админ Панель - Сделано Молодежью';
    require './head.php';
?>
<body>
    <h2 style="margin-top: 100px; text-align: center">Список пользователей</h2>
<div class="container-fluid">
    <div class="users_list">
        <table class="table table-dark table-sm">
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
</body>
</html>