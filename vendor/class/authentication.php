<?php
require './connect.php';
class Authentication {
    private $pdo;
    private $hash = 'esgpseogpsep43534fff';

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function find_user(string $email) : ?array {
        $sql = 'SELECT `id` FROM `users` WHERE `email` = :email LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $row_count = $stmt->rowCount();
        if ($row_count === 0) return null;
        else return $stmt->fetchAll();
    }

    public function auth(string $email, string $password){
        $black_list_chars = ['&gt', 'VALUE', 'value', '&lt;', 'SQL', 'sql','INSERT', 'INTO', 'SELECT', 'UPDATE', 'DELETE', 'FROM', 'WHERE', 'id', 'ID', 'select', 'insert', 'into', 'update', 'delete', '<', '>', '!', '~', '*', 'ALL', 'all'];
        $error = '';

        if (strlen($password) < 6){
            $error = 'Пароль должен быть не менее 6 символов!';
        }
        if (array_intersect(explode(' ', $password), $black_list_chars)){
            $error = 'Исключите посторонние символы из введенных данных)';
        }
        if (array_intersect(explode(' ', $email), $black_list_chars)){
            $error = 'Исключите посторонние символы из введенных данных)';
        }
        $password = md5($password.$this->hash);
        $sql = 'SELECT * FROM users WHERE email =:email && `password` =:pass LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email, 'pass' => $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!isset($user['id'])){
            $error = 'Проверьте правильность введенных данных';
        }
        if($error != ''){
            echo $error;
            http_response_code(400);
            exit();
        }
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['email'] = $user['email'];

        $ip = $_SERVER['REMOTE_ADDR'];

        $sql_update_ip = 'UPDATE `users` SET `last_ip` = ? WHERE `id` = ?';
        $stmt_update = $this->pdo->prepare($sql_update_ip);
        $stmt_update->execute([$ip, $user['id']]);

        echo $error;

        http_response_code(202);
    }

    public function register(string $name, string $surname, string $email, string $pass, string $date, string $ip) {
        $black_list_chars = ['&gt', 'VALUE', 'value', '&lt;', 'SQL', 'sql','INSERT', 'INTO', 'SELECT', 'UPDATE', 'DELETE', 'FROM', 'WHERE', 'id', 'ID', 'select', 'insert', 'into', 'update', 'delete', '<', '>', '!', '~', '*', 'ALL', 'all'];
        $error = '';
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
        if (!preg_match("/[0-9a-z]+@[a-zA-Z0-9\-]+.[a-zA-Z0-9\-.]+$/", $email)){
            $error = 'Проверьте правильность почтового ящика'; 
        }
        $find_user = $this->find_user($email);
        if($find_user != null){
            $error = 'Такая почта уже используется';
        }
        if($error != ''){
            echo $error;
            http_response_code(400);
            exit();
        }

        $password = md5($password . $this->hash);
        $sql = 'INSERT INTO `users`(`name`, `surname`, `email`, `password`, `date_reg`, `ip_reg`, `last_ip`) VALUES (?,?,?,?,?,?,?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $surname, $email, $password, $date, $ip, $ip]);
        http_response_code(202);
    }

}