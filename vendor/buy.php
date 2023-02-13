<?
    require 'connect.php';

    $id_product = htmlspecialchars($_POST['id_pr']);

    $sql = "SELECT * FROM `catalog` WHERE `id` = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id_product]);

    $product = $query->fetch(PDO::FETCH_ASSOC);


    $id_user = htmlspecialchars($_POST['id_us']);

    $sql = "SELECT * FROM `users` WHERE `id` = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id_user]);

    $user = $query->fetch(PDO::FETCH_ASSOC);



    if ($user['balance'] < $product['price']) {
        $error = 'У вас недостаточно коинов';
        echo $error;
        exit();
    } else {
        if ($product['amount'] <= 0) {
            $error = "Товара нет на складе. <a href='./catalog.php'>Вернуться назад</a>";
            echo $error;
        } else {
            $new_amount_product = $product['amount'] - 1;

            $sql = "UPDATE `catalog` SET `amount` = :new_amount WHERE `id` = :id";
            $query = $pdo -> prepare($sql);
            $query->execute(['new_amount' => $new_amount_product, 'id' => $product['id']]);



            $date = date("Y-m-d H:i:s");
            $new_balance_user = $user['balance'] - $product['price'];

            $sql = 'INSERT INTO `buy_list`(`id_product_buyed`, `id_user_buyer`, `date`, `price`) VALUES (?, ?, ?, ?)';
            $query = $pdo->prepare($sql);
            $query->execute([$product['id'], $id_user, $date, $product['price']]);



            $sql = 'UPDATE `users` SET `balance` = :new_balance_user WHERE `id` = :id';
            $query = $pdo -> prepare($sql);
            $query->execute(['id' => $id_user, 'new_balance_user' => $new_balance_user]);

            $suc = 'Вы успешно оформили покупку!';
            echo $suc;

            http_response_code(202);
        }
        
    }
    
?>