<?php 
    require_once './class/authentication.php';

    $name = htmlspecialchars($_POST['username']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);

    $date = date("Y-m-d H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    try {
        $pdo = Connection::get()->connect();
        $auth = new Authentication($pdo);
        $reg = $auth->register($name, $surname, $email, $pass, $date, $ip);
        if ($error == ''){
            http_response_code(202);
        } else {
            echo $error;
            http_response_code(400);
        }
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
?>