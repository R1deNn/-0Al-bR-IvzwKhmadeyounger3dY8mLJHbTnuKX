<?php
    $confirmation_token = '2e40c809';
    $secret_key = 'awfawfW98yfhwa9f7';
    function vk_msg_send($peer_id, $text){
        $request_params = array(
            'message' => $text, 
            'peer_id' => $peer_id, 
            'access_token' => "vk1.a.OzCjz6--kvDcK23zfu1zaYJPZZGcBJmnjS9ii9yucVaCmjiA_99TTrFUJO6JMg-kUA9YFqtNdCvgkbqGcdTQ5EfWgBoYHTMQAggy-m07cD_til2Xki1xANnoNEyqskmcttyctwfLS-gRT7OW5riI7oyW1YHDKSx6cpWxojXgb80DlBMaLdijHorXJhx6SmodVNTeU6CwmMY9vFNQNL5skg",
            'v' => '5.87' 
        );
        $get_params = http_build_query($request_params); 
        file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
    }
    $data = json_decode(file_get_contents('php://input'));
    $hi_words[0] = array('здравствуйте', 'Здравствуйте', 'привет', 'Привет', 'ПРИВЕТ', 'как дела', 'Как дела?', 'как дела?', 'прив', 'хай', 'салам', 'Прив', 'Хай', 'Салам', 'Шалом', 'хей', 'Хей', 'ы');

    $secret_key_from_query = $data->secret;

    if ($secret_key_from_query == $secret_key) {
        switch ($data->type) {  
        

            case 'confirmation': 
                echo $confirmation_token; 
            break;  
                
            case 'message_new': 
                $message_text = $data -> object -> text;
                $chat_id = $data -> object -> peer_id;
                if (array_intersect(explode(' ', $message_text), $hi_words[0])){
                    vk_msg_send($chat_id, "И тебе привет) я бот, который живет в этой группе<br>Пока-что я не особо умный, но мои создатели каждый день трудятся в улучшении моих навыков)");
                    echo 'ok';
                } else {
                    vk_msg_send($chat_id, "Пока я не могу самостоятельно ответить на твой вопрос(<br>Поэтому я выслал уведомление всем администраторам группы, они скоро придут к тебе в диалог)");
                    echo 'ok';
                }
                if ($message_text == "пока"){
                    vk_msg_send($chat_id, "Пока. Если захочешь с кем-то поговорить, то у тебя есть бот, который говорит несколько фразы.");
                    echo 'ok';
                }
                echo 'ok';
            break;


        }   
    } else {
        echo 'Не выйдет :)';
        echo 'ok';
    }
?>