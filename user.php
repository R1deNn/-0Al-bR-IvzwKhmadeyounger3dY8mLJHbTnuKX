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
<?
    require './vendor/view/user_lk.php';
}
require './layout/footer.php'
?>
</body>
</html>