<?
    require './header.php';
    $website_title = 'Мероприятия - Сделано Молодежью';
    require './head.php';
?>
<body>
    <div class="wrapper_admin">
        <div class="admin_page">
            <?require 'admin_menu_left.php'?>

            <div class="right_side_block_admin">
                <div class="info_admin_block">
                <div class="card_event_news">
                    <?
                        require '../vendor/connect.php';
                        $sql = 'SELECT * FROM `news_events`';
                        $query = $pdo->prepare($sql);
                        $query->execute();

                        foreach($query as $card){
                            setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');  
                            ?>
                            <img src=".<?=$card['img']?>" alt="" width='100%'>
                            <h2><?=$card['title']?></h2>
                            <p><?=$card['tiny_descr']?></p>
                            <p style='text-align: right;'><?=date("d.m.Y",strtotime($card['date_start']))?></p>
                            <div class="link_card_news_events">
                                <a href="./edit_event.php?id=<?=$card['id']?>">Подробнее</a>
                            </div>
                            <?
                        }
                    ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>