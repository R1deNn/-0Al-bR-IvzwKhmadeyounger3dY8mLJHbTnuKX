<?require_once './vendor/controllers/getPostsForIndex.php'?>
<div class="news_and_events">
<?
    foreach($news_events as $n_e){
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