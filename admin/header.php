<link rel="stylesheet" href="./assets/css/styles.css">
<link rel="stylesheet" href="../assets/css/styles.css">
<?
    session_start();
?>
<body>
    <div class="wrapper_index" id='wrapper_index'>
        <header>
            <div class="left_side_header">
                <a href="./index.php"><img src="../assets/img/logo.svg" alt=""></a>
            </div>

            <div class="right_side_header">
                <?
                if (!empty($_SESSION['id'])) {
                    require '../vendor/user_info_from_bd.php';
                    if ($user['rules'] == 1) {
                        ?>
                        <a href="./user.php">
                        <img src="../assets/img/user.svg" alt="" width="25px">
                        </a>
                        <a href="./admin/admin_panel.php">
                            <img src="../assets/img/admin.svg" alt="" width='30px'>
                        </a>
                        <a>
                            <img id='brg_menu' src="../assets/img/burger_menu.svg" alt="">
                        </a>
                        <?
                    } else {
                        ?>
                        <a href="./user.php">
                        <img src="../assets/img/user.svg" alt="" width="25px">
                        </a>
                        <a>
                            <img id='brg_menu' src="../assets/img/burger_menu.svg" alt="">
                        </a>
                        <?
                    }
                    ?>
                    
                    <div id="br_menu_show">
                        <img src="../assets/img/x.svg" alt="" id='close_br_menu'>

                        <div class="cards_bg_menu">
                            <div class="card">
                                <a href="#">Домой</a>
                            </div>

                            <div class="card">
                                <a href="#">Домой</a>
                            </div>

                            <div class="card">
                                <a href="#">Домой</a>
                            </div>

                            <div class="card">
                                <a href="#">Домой</a>
                            </div>
                        </div>
                    </div>
                <?
                } else {
                ?>
                    <a href="../auth.php">
                        <img src="../assets/img/log_in.svg" alt="">
                    </a>
                     
                    <a>
                        <img id='brg_menu' src="../assets/img/burger_menu.svg" alt="">
                    </a>
                    
                    <div id="br_menu_show">
                        <img src="../assets/img/x.svg" alt="" id='close_br_menu'>

                        <div class="cards_bg_menu">
                            <div class="card">
                                <a href="#">Домой</a>
                            </div>

                            <div class="card">
                                <a href="#">Домой</a>
                            </div>

                            <div class="card">
                                <a href="#">Домой</a>
                            </div>

                            <div class="card">
                                <a href="#">Домой</a>
                            </div>
                        </div>
                    </div>
                <?
                }
                ?>
            </div>
        </header>
    </div>
    <script src='../assets/js/menu.js'></script>
</body>
</html>