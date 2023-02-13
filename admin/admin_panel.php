<?
    require './header.php';
    $website_title = 'Админ Панель - Сделано Молодежью';
    require './head.php';
    require '../botvk/vk_count.php';
?>
<body>
    <div class="wrapper_admin">
        <div class="admin_page">
            <?require 'admin_menu_left.php'?>

            <div class="right_side_block_admin">
                <div class="info_admin_block">
                    <div class="block_admin_info">
                        <h2>Количество подписчиков в группе:</h2>
                        <h3><?=$vkcount?></h3>
                    </div>

                    <div class="block_admin_info">
                        
                    </div>

                    <div class="block_admin_info">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>