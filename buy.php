<?
    require './vendor/connect.php';

    $sql = "SELECT * FROM `catalog` WHERE `id` = :id";
    $id = $_GET['id'];
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);

    $product = $query->fetch(PDO::FETCH_OBJ);

    require './layout/header.php';
    $website_title = "$product->title - Сделано Молодежью";
    require './layout/head.php';
    
    if (!empty($_SESSION['id'])) {
        require './vendor/user_info_from_bd.php';
    }
?>
<body>
    <div class="wrapper_buy">
        <div class="product_info">
            <div class="img_product_info">
                <img src="<?=$product->img?>" alt="">
            </div>

            <div class="text_btn_product_info">
                <h1><?=$product->title?></h1>
                <p>Описание: <?=$product->description?></p>
                <p>Цена: <?=$product->price?> коинов</p>
                <?
                if (!empty($_SESSION['id'])) {
                ?>
                    <p>У вас <?=$user['balance']?> коинов</p>
                <?}?>
                <?
                if (!empty($_SESSION['id'])) {
                    ?>
                    <form id='buy_form'>
                        <input type="text" value='<?=$product->id?>' style='display: none;' name='id_pr'>
                        <input type="text" value='<?=$user['id']?>' style='display: none;' name='id_us'>
                        <button>Купить</button>
                    </form>
                    <?
                } else {
                    ?>
                    <a href="./auth.php">Купить</a>
                    <?
                }
                
                ?>

                <div id="error_block"></div>
            </div>
        </div>
    </div>
    
    <script>
        buy_form.addEventListener('submit', async (e) => {
        e.preventDefault();

        let response = await fetch('./vendor/buy.php', {
            method: 'POST',
            body: new FormData(buy_form)
        });
        let result = await response.text();
        error_block.innerHTML = `${result}`;
        });
    </script>
</body>
</html>