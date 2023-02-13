<?php 
    $name = htmlspecialchars($_POST['username']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);

    $date = date("Y-m-d H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    require_once('connect.php');
    
    $sql = 'SELECT * FROM `users` WHERE `email` = ?'; 
    $query = $pdo->prepare($sql);
    $query->execute([$email]);
    $user = $query->fetch(PDO::FETCH_OBJ);

    $black_list_chars = ['&gt', 'VALUE', 'value', '&lt;', 'SQL', 'sql','INSERT', 'INTO', 'SELECT', 'UPDATE', 'DELETE', 'FROM', 'WHERE', 'id', 'ID', 'select', 'insert', 'into', 'update', 'delete', '<', '>', '!', '~', '*', 'ALL', 'all'];
    
    $error = '';

    if (!empty($user)) {
        $error = 'Такой пользователь уже есть';
    }
    if (strlen($name) < 2){
        $error = 'Имя должно быть более 1 буквы';
    }
    if (strlen($pass) < 6){
        $error = 'Пароль должен быть не менее 6 символов!';
    }
    if (array_intersect(explode(' ', $pass), $black_list_chars)){
        $error = 'Исключите посторонние символы из введенных данных)';
    }
    if (array_intersect(explode(' ', $email), $black_list_chars)){
        $error = 'Исключите посторонние символы из введенных данных)';
    }
    if (array_intersect(explode(' ', $name), $black_list_chars)){
        $error = 'Исключите посторонние символы из введенных данных)';
    }
    if (array_intersect(explode(' ', $surname), $black_list_chars)){
        $error = 'Исключите посторонние символы из введенных данных)';
    }
    if (!preg_match("/[0-9a-z]+@[a-zA-Z0-9\-]+.[a-zA-Z0-9\-.]+$/", $email)) {
      $error = 'Проверьте правильность почтового ящика'; 
    }

    if ($error != '') {
        http_response_code(400);
        echo $error;
        exit();
    }

    $hash = 'esgpseogpsep43534fff';
    $pass = md5($pass.$hash);

    $sql = 'INSERT INTO `users`(`name`, `surname`, `email`, `password`, `date_reg`, `ip_reg`, `last_ip`) VALUES (?,?,?,?,?,?,?)';
    $query = $pdo->prepare($sql);
    $query->execute([$name, $surname, $email, $pass, $date, $ip, $ip]);
    
    
    http_response_code(202);
?>