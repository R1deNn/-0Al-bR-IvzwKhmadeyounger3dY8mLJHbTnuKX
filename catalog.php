<?
    require './layout/header.php';
    $website_title = 'Каталог - Сделано Молодежью';
    require './layout/head.php';
    require './vendor/connect.php';
?>
<body class='shop_body'>
    <div class="wrapper_catalog">
        <div class='shop_main'>
            <h1>сделано молодежью альметьевска <br> <span>магазин</span> <br>молодежно - и точка</h1>
        </div>
    </div>

    <div class="marquee-container">
    <p class="marquee">
        сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью сделано молодежью 
    </p>
    </div>

    <div class="wrapper_catalog">
        <div class="catalog_list">
            <?
                $sql = "SELECT * FROM `catalog`";
                $query = $pdo->prepare($sql);
                $query -> execute();

                foreach($query as $product){
                    ?>
                    <div class="card_catalog">
                        <a href="./buy.php?id=<?=$product['id']?>" class='no_style_a'>
                            <div class="img_card_catalog">
                            <p style='text-align: center;'><img src="<?=$product['img']?>" alt="" width='100%'></p>
                        </a>
                        </div>
                                <div class="text_card_catalog">
                                    <h3><?=$product['title']?></h3>
                                    <h4><?=$product['price']?> баллов</h4>
                                </div>
                                <div class="btn_card_catalog">
                                    <a href="./buy.php?id=<?=$product['id']?>" class='buy_btn_card_catalog'>Купить</a>
                                </div>
                    </div>
                    <?
                }
            ?>
        </div>
    </div>
</body>
</html>