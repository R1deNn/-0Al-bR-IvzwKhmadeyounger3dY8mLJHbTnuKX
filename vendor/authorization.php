<?php 
    session_start();
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);

    $hash = 'esgpseogpsep43534fff';
    $pass = md5($pass.$hash);

    require_once('connect.php');
    

    $sql = 'SELECT * FROM users WHERE email =:email && password =:pass';

    $black_list_chars = ['&gt;', 'VALUE', 'value', '&lt;', 'SQL', 'sql','INSERT', 'INTO', 'SELECT', 'UPDATE', 'DELETE', 'FROM', 'WHERE', 'id', 'ID', 'select', 'insert', 'into', 'update', 'delete', '<', '>', '!', '~', '*', 'ALL', 'all'];


    $query = $pdo->prepare($sql);
    $query->execute(['email' => $email, 'pass' => $pass]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!isset($user['id'])) {
        http_response_code(400);
        echo 'Неправильный логин/пароль'; 
    } else if(array_intersect(explode(' ', $email), $black_list_chars) || array_intersect(explode(' ', $pass), $black_list_chars)){
        http_response_code(400);
        echo 'Исключите посторонние символы';
    } else {
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['email'] = $user['email'];

        $ip = $_SERVER['REMOTE_ADDR'];

        $sql = 'UPDATE `users` SET `last_ip` = ? WHERE `id` = ?';
        $query = $pdo->prepare($sql);
        $query->execute([$ip, $user['id']]);
    }
?>