<?
    require './layout/header.php';
    $id_ev_nw = $_GET['id'];
    require './vendor/connect.php';
    $sql = 'SELECT * FROM `news_events` WHERE `id` = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id_ev_nw]);

    $event = $query->fetch(PDO::FETCH_OBJ);

    $website_title = "$event->title - Сделано Молодежью";
    require './layout/head.php';
?>
<body>
<div class="wrapper_news_event">
    <div class="left_side_news_event">
        <img src="<?=$event->img?>" alt="" width='95%'>
    </div>

    <div class="right_side_news_event">
        <h1><?=$event->title?></h1>
        <p><?=$event->descr?></p>
        <p>Возрастное ограничение: с <?=$event->age?> лет</p>
        <p>Начало мероприятия: <?=date("d.m.Y H:i",strtotime($event->date_start))?></p>
            <?
            if ($event->free_space > 0) {
                if ($event->free_space <= 10) {
                    echo "<p style='color: red;'>Осталось $event->free_space мест!</p>";
                    ?>
                    <div class="link_block_r_s_n_e">
                        <a href="./request_on_event.php?id=<?=$event->id?>">Пойду!</a>
                    </div>
                <?
                } else {
                    echo "<p>Осталось $event->free_space мест</p>";
                    ?>
                        <div class="link_block_r_s_n_e">
                            <a href="./request_on_event.php?id=<?=$event->id?>">Пойду!</a>
                        </div>
                    <?
                }
                
            } else {
                echo "<p style='color: red;'>Свободных мест нет :(</p>";
            }
            
            ?>
    </div>
</div>

</body>
</html>