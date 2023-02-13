<link rel="stylesheet" href="./assets/css/styles.css">
<link rel="stylesheet" href="../assets/css/styles.css">
<?
    session_start();
?>
    <div class="wrapper_index" id='wrapper_index'>
        <header>
            <div class="left_side_header">
                <a href="./index.php"><img src="./assets/img/logo.svg" alt=""></a>
            </div>

            <div class="right_side_header">
                <?
                if (!empty($_SESSION['id'])) {
                    require './vendor/user_info_from_bd.php';
                    if ($user['rules'] == 1) {
                        ?>
                        <a href="./user.php">
                        <img src="./assets/img/user.svg" alt="" width="25px">
                        </a>
                        <a href="./admin/admin_panel.php">
                            <img src="./assets/img/admin.svg" alt="" width='30px'>
                        </a>
                        <a>
                            <img id='brg_menu' src="./assets/img/burger_menu.svg" alt="">
                        </a>
                        <?
                    } else {
                        ?>
                        <a href="./user.php">
                        <img src="./assets/img/user.svg" alt="" width="25px">
                        </a>
                        <a>
                            <img id='brg_menu' src="./assets/img/burger_menu.svg" alt="">
                        </a>
                        <?
                    }
                    ?>
                    
                    <div id="br_menu_show">
                        <img src="./assets/img/x.svg" alt="" id='close_br_menu'>

                        <div class="cards_bg_menu">

                            <a href="./about_project.php" class="card one">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/fire_emoji.svg" alt="" width='23px'>
                                </div>

                                <div class="text_right">
                                    о нашем проекте
                                </div>
                            </a>

                            <a href="./catalog.php" class="card two">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/cart_emoji.svg" alt="" width='25px'>
                                </div>

                                <div class="text_right">
                                    магазин
                                </div>
                            </a>

                            <a href="#" class="card three">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/laptop_emoji.svg" alt="" width='25px'>
                                </div>

                                <div class="text_right">
                                    группа ВКонтакте
                                </div>
                            </a>

                            <a href="#" class="card four">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/laptop_emoji.svg" alt="" width='25px'>
                                </div>

                                <div class="text_right">
                                    telegram-канал
                                </div>
                            </a>

                            <a href="./news_events.php" class="card five">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/news_emoji.svg" alt="" width='25px'>
                                </div>

                                <div class="text_right">
                                    новости и мероприятия
                                </div>
                            </a>

                            <a href="#" class="card six">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/hands_emoji.svg" alt="" width='25px'>
                                </div>

                                <div class="text_right">
                                    сотрудничать с проектом
                                </div>
                            </a>

                            <a href="./vendor/logout.php" class="card seven">
                                <div class="emoji_left">
                                    
                                </div>

                                <div class="text_right">
                                    выйти из аккаунта
                                </div>
                            </a>
                        </div>
                    </div>
                <?
                } else {
                ?>
                    <a href="./auth.php">
                        <img src="./assets/img/log_in.svg" alt="">
                    </a>
                     
                    <a>
                        <img id='brg_menu' src="./assets/img/burger_menu.svg" alt="">
                    </a>
                    
                    <div id="br_menu_show">
                        <img src="./assets/img/x.svg" alt="" id='close_br_menu'>

                        <div class="cards_bg_menu">

                            <a href="./about_project.php" class="card one">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/fire_emoji.svg" alt="" width='23px'>
                                </div>

                                <div class="text_right">
                                    о нашем проекте
                                </div>
                            </a>

                            <a href="./catalog.php" class="card two">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/cart_emoji.svg" alt="" width='25px'>
                                </div>

                                <div class="text_right">
                                    магазин
                                </div>
                            </a>

                            <a href="#" class="card three">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/laptop_emoji.svg" alt="" width='25px'>
                                </div>

                                <div class="text_right">
                                    группа ВКонтакте
                                </div>
                            </a>

                            <a href="#" class="card four">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/laptop_emoji.svg" alt="" width='25px'>
                                </div>

                                <div class="text_right">
                                    telegram-канал
                                </div>
                            </a>

                            <a href="./news_events.php" class="card five">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/news_emoji.svg" alt="" width='25px'>
                                </div>

                                <div class="text_right">
                                    новости и мероприятия
                                </div>
                            </a>

                            <a href="#" class="card six">
                                <div class="emoji_left">
                                    <img src="./assets/img/emoji/hands_emoji.svg" alt="" width='25px'>
                                </div>

                                <div class="text_right">
                                    сотрудничать с проектом
                                </div>
                            </a>

                            <a href="./auth.php" class="card seven">
                                <div class="emoji_left">
                                    
                                </div>

                                <div class="text_right">
                                    войти или зарегистрироваться
                                </div>
                            </a>
                        </div>
                    </div>
                    </div>
                <?
                }
                ?>
            </div>
        </header>
    </div>
    <script src='./assets/js/menu.js'></script>
</html>