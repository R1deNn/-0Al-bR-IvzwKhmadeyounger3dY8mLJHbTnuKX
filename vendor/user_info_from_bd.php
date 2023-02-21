<?
    require_once 'connect.php';
    $sql = 'SELECT * FROM `users` WHERE `id` =:id';


    $query = $pdo->prepare($sql);
    $query->execute(['id' => $_SESSION['id']]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
?>