<?
    require_once './admin_class/authentication.php';
    require_once './header.php';
    $website_title = 'Админ Панель - Сделано Молодежью';
    require_once './head.php';
    require_once '../botvk/vk_count.php';

    $sql = 'SELECT `id` FROM `users`';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users_count = $stmt->rowCount();

    $sql = 'SELECT `id` FROM `news_events`';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $news_events_count = $stmt->rowCount();
    header('Access-Control-Allow-Origin: *');
?>
<body>
    <div class="downable-header-admin container-fluid">
        <div class="row">
            <div class="col">
                <h2 style="text-align: center">Общие сводки</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <div class="card text-center">
                <div class="card-header bg-dark">
                    Участники группы ВК
                </div>
                <div class="card-body bg-dark">
                    <h5 class="card-title"><?=$vkcount?></h5>
                    <a href="https://vk.com/madeyouth_alm" class="btn btn-primary" target="_blank">Посетить</a>
                </div>
            </div>                
            </div>

            <div class="col">
            <div class="card text-center">
                <div class="card-header bg-dark">
                    Всего пользователей
                </div>
                <div class="card-body bg-dark">
                    <h5 class="card-title"><?=$users_count?></h5>
                    <a href="./users_edit.php" class="btn btn-primary">Перейти к управлению</a>
                </div>
            </div>                  
            </div>

            <div class="col">
            <div class="card text-center">
                <div class="card-header bg-dark">
                    Всего мероприятий
                </div>
                <div class="card-body bg-dark">
                    <h5 class="card-title"><?=$news_events_count?></h5>
                    <a href="https://vk.com/madeyouth_alm" class="btn btn-primary">Перейти к управлению</a>
                </div>
            </div>                  
            </div>
        </div>
    </div>

<script>
// Запрос информации о новых сообщениях в группе через PHP-скрипт
function getNewMessages() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'new_message.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Обработка полученных данных
      var response = JSON.parse(xhr.responseText);
      if (response.failed == 1) {
        ts = response.ts;
      } else {
        // Новое сообщение в группе
        console.log('New message!');
        // Отображение уведомления на странице
        // ...
        ts = response.ts;
      }
    }
  };
  xhr.send();
}

// Запрос информации о новых сообщениях каждые 5 секунд
setInterval(getNewMessages, 5000);    
</script>
</body>
</html>