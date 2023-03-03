<?
require_once './vendor/connect.php';
function getPosts() {
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM `news_events` ORDER BY `id` DESC LIMIT 3';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $news_events = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $news_events;
}

function getInfoLoggedUser($id){
    $pdo = Connection::get()->connect();
    $sql = 'SELECT * FROM `users` WHERE `id` = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function buyUser($id, $id_product){
    $pdo = Connection::get()->connect();
    $sql = 'SELECT `balance` FROM `users` WHERE `id` = :id LIMIT 1';
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
    $balance = $statement->fetch(PDO::FETCH_ASSOC);

    $sql = 'SELECT `price` FROM `catalog` WHERE `id` = :id LIMIT 1';
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id_product]);
    $price = $statement->fetch(PDO::FETCH_ASSOC);

    if($balance['balance'] < $price['price']){
        echo 'Недостаточно средств';
        http_response_code(400);
        die();
    }
    if($price['price'] <= 0){
        echo 'Произошла ошибка. Пожалуйста, попробуйте позже';
        http_response_code(400);
        die();
    }

    
}
?>