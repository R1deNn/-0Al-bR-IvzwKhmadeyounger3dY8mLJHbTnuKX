<?
    require 'connect.php';

    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $age = htmlspecialchars($_POST['age']);
    $id_event = htmlspecialchars($_POST['id_event']);
    $tel = htmlspecialchars($_POST['tel']);

    $sql = 'SELECT * FROM `news_events` WHERE `id` = :id_event';
    $query = $pdo->prepare($sql);
    $query->execute(['id_event' => $id_event]);

    $event = $query->fetch(PDO::FETCH_ASSOC);

    $error = '';

    if ($event['free_space'] > 0) {
        if ($age >= $event['age']) {
            $date = date("Y-m-d H:i:s");
            $sql = 'INSERT INTO `requests_on_events`(`name_us`, `surname_us`, `age_us`, `tel_us`, `id_event`, `dateTimeReq`) VALUES (?,?,?,?,?,?)';
            $query = $pdo->prepare($sql);
            $query->execute([$name, $surname, $age, $tel, $id_event, $date]);

            $old_space = $event['free_space'];

            $new_free_space = $old_space - 1;

            $sql = 'UPDATE `news_events` SET `free_space` = :new_free_space';
            $query = $pdo->prepare($sql);
            $query->execute(['new_free_space' => $new_free_space]);

            http_response_code(202);
        } else {
            http_response_code(400);
            $error = 'Вы не подходите по возрасту';
            echo $error;
            exit();
        }
        
    } else {
        http_response_code(400);
        $error = 'Свободных мест не осталось';
        echo $error;
        exit();
    }
    
?>