<?
    require './layout/header.php';
    $id_ev_nw = $_GET['id'];

    require './vendor/connect.php';

    $sql = 'SELECT * FROM `news_events` WHERE `id` = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id_ev_nw]);

    $event = $query->fetch(PDO::FETCH_OBJ);

    $website_title = "Заявка на $event->title - Сделано Молодежью";
    require './layout/head.php';
    if (!empty($_SESSION['id'])) {
        echo "<p>Заявка отправлена!</p>";
    } else {
?>
<body>
<div class="wrapper_news_event">
    <div class="left_side_news_event">
        <img src="<?=$event->img?>" alt="" width='95%'>
    </div>

    <div class="right_side_news_event">
        <h1><?=$event->title?></h1>
        <p>Для отправки заявки на посещение мероприятия, вам необходимо заполнить форму ниже. Чтобы в следующий раз пропустить этап заполнения,
            <a href="./reg.php">зарегистрируйтесь</a> или, если уже зарегистрированы, <a href='./auth.php'>авторизуйтесь</a> на сайте
        </p>

        <form id='event_form'>
            <p>Имя</p>
            <input type="text" name='name' required>
            <p>Фамилия</p>
            <input type="text" name='surname' required>
            <p>Возраст</p>
            <input type="text" name='age' required>
            <p>Телефон</p>
            <input type="text" name='tel' required>
            <input type="text" name='id_event' style='display: none;' value='<?=$event->id?>'>
            <p>Нажимая на кнопку отправить, вы соглашаетесь с <a href="">пользовательским соглашением</a> и с <a href="#">обработкой и хранением персональных данных</a></p>
            <button>Отправить</button>
        </form>
        <div id="info_block"></div>
    </div>
</div>
<?}?>
<script src='./assets/js/request_on_event.js'></script>
<?require './layout/footer.php'?>
</body>
</html>