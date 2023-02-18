<?php 
    require_once './class/authentication.php';

    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);

    $ip = $_SERVER['REMOTE_ADDR'];

    try {
        $pdo = Connection::get()->connect();
        $auth = new Authentication($pdo);
        $authorization = $auth->auth($email, $pass);
        if (!isset($error)){
            http_response_code(202);
        } else {
            echo $error;
            http_response_code(400);
        }
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
?>