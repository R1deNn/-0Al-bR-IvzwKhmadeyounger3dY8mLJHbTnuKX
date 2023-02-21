<?
    require_once './layout/header.php';
    $website_title = 'Ошибка 404 - Сделано Молодежью';
    require_once './layout/head.php';
    require_once './vendor/connect.php';
?>
<body>
    <div class="notfound_block">
        <h1>404</h1>
        <h2>страница не найдена</h2>
        <p>кажется вы немного заблудились и попали в закулисье сайта <br> ничего страшного, сейчас мы вас выведем отсюда</p>
        <div class="home_a_notfound"><a href="./index.php">Домой</a></div>
    </div>
    <?require './layout/footer.php'?>
</body>
</html>