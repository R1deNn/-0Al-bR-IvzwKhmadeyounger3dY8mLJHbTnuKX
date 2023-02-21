<?
    require_once './layout/header.php';
    $id_ev_nw = $_GET['id'];

    require_once './vendor/connect.php';

    $sql = 'SELECT * FROM `news_events` WHERE `id` = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id_ev_nw]);

    $event = $query->fetch(PDO::FETCH_OBJ);

    $website_title = "Заявка на $event->title - Сделано Молодежью";
    require_once './layout/head.php';
    if (!empty($_SESSION['id'])) {
        require_once './vendor/user_info_from_bd.php';
        $auth = true;
    }
?>
<body>
<div class="wrapper_news_event">
    <div class="left_side_news_event">
        <img src="<?=$event->img?>" alt="" width='95%'>
    </div>

    <div class="right_side_news_event">
        <h1><?=$event->title?></h1>
        <?
            if(!isset($auth)){
                ?>
                <p>Для отправки заявки на посещение мероприятия, вам необходимо заполнить форму ниже. Чтобы в следующий раз пропустить этап заполнения,
                    <a href="./reg.php">зарегистрируйтесь</a> или, если уже зарегистрированы, <a href='./auth.php'>авторизуйтесь</a> на сайте
                </p>
                <?
            }
        ?>

        <?
        if(isset($auth)){
        ?>
        <form id='event_form'>
            <p>Имя</p>
            <input type="text" name='name' required value='<?=$user['name']?>'>
            <p>Фамилия</p>
            <input type="text" name='surname' required value='<?=$user['surname']?>'>
            <p>Возраст</p>
            <input type="text" name='age' required value='<?=$user['age']?>'>
            <p>Телефон</p>
            <input type="text" name='tel' required value='<?=$user['tel']?>'>
            <input type="text" name='id_event' style='display: none;' value='<?=$event->id?>'>
            <p>Нажимая на кнопку отправить, вы соглашаетесь с <a href="">пользовательским соглашением</a> и с <a href="#">обработкой и хранением персональных данных</a></p>
            <button>Отправить</button>
        </form>
        <?
        } else {
        ?>
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
        <?
        }
        ?>
        <div id="info_block"></div>
    </div>
</div>
<script src='./assets/js/request_on_event.js'></script>
<?require_once './layout/footer.php'?>
</body>
</html>