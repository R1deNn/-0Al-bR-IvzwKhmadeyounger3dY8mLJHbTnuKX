<?php
    $group_id = 'madeyouth_alm';
    $request_params = array(
    'group_id' => $group_id,
    'fields' => 'members_count',
    'v' => '5.87',
    'access_token' => 'vk1.a.OzCjz6--kvDcK23zfu1zaYJPZZGcBJmnjS9ii9yucVaCmjiA_99TTrFUJO6JMg-kUA9YFqtNdCvgkbqGcdTQ5EfWgBoYHTMQAggy-m07cD_til2Xki1xANnoNEyqskmcttyctwfLS-gRT7OW5riI7oyW1YHDKSx6cpWxojXgb80DlBMaLdijHorXJhx6SmodVNTeU6CwmMY9vFNQNL5skg' // Сервисный ключ доступа для апи
    );
    $get_params = http_build_query($request_params);
    $result = json_decode(file_get_contents('https://api.vk.com/method/groups.getById?'. $get_params)); // Делаем запрос по нужному методу
    $vkcount = ($result -> response[0] -> members_count);
?>