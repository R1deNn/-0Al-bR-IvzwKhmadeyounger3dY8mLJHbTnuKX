<?
    require './header.php';
    $website_title = 'Редактирование пользователя - Сделано Молодежью';
    require './head.php';

    $id_user = $_GET['id'];

    require '../vendor/connect.php';

    $sql = 'SELECT * FROM `users` WHERE `id` = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id_user]);

    $user = $query->fetch(PDO::FETCH_ASSOC);
?>
<body>
<div class="wrapper_admin">
    <div class="admin_page">
        <?require 'admin_menu_left.php'?>

        <div class="right_side_block_admin">
            <h1 style='text-align:center;'>Информация о пользователе:</h1>
            <form id='edit_user_form'>
                <img src=".<?=$user['img']?>" alt="" width='300px'>
                <p>Имя: <input type="text" value='<?=$user['name']?>'></p>
                <p>Фамилия: <input type="text" value='<?=$user['surname']?>'></p>
                <p>E-mail: <input type="text" value='<?=$user['email']?>'></p>
                <p>Телефон: <input type="text" value='<?=$user['tel']?>'></p>
                <p>Дата рождения: (ГГГГ-ММ-ДД) <?=$user['bth_day']?></p>
                <p>Дата регистрации: <?=$user['date_reg']?></p>
                <p>IP регистрации: <?=$user['ip_reg']?> последний IP: <?=$user['last_ip']?></p>
                <p>Баланс: <input type="text" value='<?=$user['balance']?>'></p>
                <button>Сохранить</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>