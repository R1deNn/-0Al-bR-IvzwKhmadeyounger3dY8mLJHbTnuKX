<?
    require_once './layout/header.php';
    $website_title = 'Новости и мероприятия - Сделано Молодежью';
    require_once './layout/head.php';
?>
<body>
    <form>
        <p>Сортировка:</p>
        <p>Все</p>
        <input type="checkbox" selected>
        <p>Только мероприятия</p>
        <input type="checkbox">
        <p>Только новости</p>
        <input type="checkbox">
    </form>
    <div class="wrapper_events_news">
            <?
                require_once './vendor/connect.php';
                $sql = 'SELECT * FROM `news_events`';
                $query = $pdo->prepare($sql);
                $query->execute();

                foreach($query as $card){
                    setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');  
                    ?>
                    <div class="card_event_news">
                        <div class="img_card_event_news">
                            <a href="./news_event.php?id=<?=$card['id']?>">
                                <img src="<?=$card['img']?>" alt="" width='100%'>
                            </a>
                        </div>
                        <div class="text_card_event_news">
                            <h2><?=$card['title']?></h2>
                            <p><?=$card['tiny_description']?></p>
                            <p style='text-align: right;'><?=date("d.m.Y",strtotime($card['date_start']))?></p>
                            <div class="link_card_news_events">
                                <a href="./news_event.php?id=<?=$card['id']?>">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    <?
                }
            ?>
    </div>
</body>
</html>