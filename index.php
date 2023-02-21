<?
    require './layout/header.php';
    $website_title = 'Главная - Сделано Молодежью';
    require './layout/head.php';
?>
<body id='blured'>
    <div class="wrapper_index" id='wrapper_index'>
    <main>
        <div class="left_side_main">
            <div class="left_side_main_flex">
                <div class="top_main_flex">
                    <h1>сделано<br><span class="rotate_span"><span class='unrotate_span'>молодежью</span></span><br>альметьевска</h1>
                    <button>Прочесть больше</button>
                </div>
                <div class="bottom_main_flex">
                    <img src="./assets/img/arrows_main.svg" alt="">
                </div>
            </div>
        </div>

        <div class="right_side_main">
            <img src="./assets/img/main_people.svg" alt="" width='98%'>
        </div>

    </main>

    <h2 class="news_events">новости и мероприятия</h2>
    </div>
    <div class="news_and_events">
        <?
            $sql = 'SELECT * FROM `news_events` ORDER BY `id` DESC LIMIT 3';
            $query = $pdo->prepare($sql);
            $query->execute();

            foreach($query as $n_e){
                ?>
                <div class="card_news_events">
                    <div class="card_img">
                        <a href="./news_event.php?id=<?=$n_e['id']?>">
                            <img src="<?=$n_e['img']?>" alt="">
                        </a>
                    </div>
                    <h3><?=$n_e['title']?></h3>
                    <p><?=$n_e['description']?></p>
                    <div class="link_read">
                        <div class="link_read_left">
                            <a href="./news_event.php?id=<?=$n_e['id']?>">Читать полностью</a>
                        </div>

                        <div class="link_read_right">
                            <a href="./news_event.php?id=<?=$n_e['id']?>"><img src="./assets/img/arrow-right.svg" alt=""></a>
                        </div>
                    </div>
                </div>
                <?
            }
        ?>

        </div>
    </div>

    <div class="wrapper_index">
        <div class="look_all_news">
            <div class="look_left">
                <a href="#">Смотреть все новости и мероприятия</a>
            </div>

            <div class="look_right">
                <a href="#"><img src="./assets/img/arrow-right-light.svg" alt=""></a>
            </div>
        </div>

        <div class="our_socials">
            <div class="left_block_social">
                <h2>наши<br>социальные<br>сети</h2>
            </div>

            <div class="center_social">
                <h2>Подписывайся, чтобы быть в курсе всех новостей и событий!</h2>
            </div>

            <div class="pre_right_social">
                <img src="./assets/img/arrow_social.svg" alt="">
            </div>

            <div class="right_social">
                <div class="right_social_vk">
                    <a href="#">ВКонтакте</a>
                </div>

                <div class="right_social_tg">
                    <a href="#">Telegram</a>
                </div>
            </div>
        </div>
    </div>

    <?require './layout/footer.php'?>
</body>
</html>