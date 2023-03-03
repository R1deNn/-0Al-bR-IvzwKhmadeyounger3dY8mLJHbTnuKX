<?
    require_once './mailer/Exception.php';
    require_once './mailer/PHPMailer.php';
    require_once './mailer/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';

    $yourEmail = 'bbb123123123321@yandex.ru'; // ваш email на яндексе
    $password = 'nenuioojthlknghh'; // ваш пароль к яндексу или пароль приложения

    // настройки SMTP
    $mail->Mailer = 'smtp';
    $mail->Host = 'ssl://smtp.yandex.ru';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = $yourEmail; // ваш email - тот же что и в поле From:
    $mail->Password = $password; // ваш пароль;


    // формируем письмо

    // от кого: это поле должно быть равно вашему email иначе будет ошибка
    $mail->setFrom($yourEmail, 'сделано молодежью Альметьевска');

    // кому - получатель письма
    $mail->addAddress('r1den0403@icloud.com', 'Регистрация');  // кому

    $mail->Subject = 'Подтверждение регистрации';  // тема письма

    $mail->msgHTML("
    
        <style>
        h1,p,img{
            text-align: center;
        }
        .btn_reg{
            text-align: center;
        }
        .btn_reg a{
            padding: 10px 40px 10px 40px;
            background-color: purple;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        img{
            border-radius: 5px;
        }
    </style>

    <p><img src='https://sun2.tattelecom-nbc.userapi.com/impg/bKOj7gE-5g47_aR_Dq-SEOmuVz388eK2VkwuLw/pMrIOFCH90Q.jpg?size=1000x1000&quality=95&sign=5929c940ffaa5cbafa04bbb7d7f322f3&type=album' alt='' width='200px'></p>
    <h1>Привет! Эта почта была указана при регистрации на сайте 'сделано молодежью'</h1>
    <h1>Если регистрировались вы, пожалуйста, нажмите на кнопку ниже</h1>
    <div class='btn_reg'><a href='#'>Это я! Зарегистрироваться</a></div>
    <p>Если вы нигде не регистрировались, просто проигнорируйте письмо :)</p>
    
    ");


    if ($mail->send()) { // отправляем письмо
        echo 'Письмо отправлено!';
    } else {
        echo 'Ошибка: ' . $mail->ErrorInfo;
    }

?>