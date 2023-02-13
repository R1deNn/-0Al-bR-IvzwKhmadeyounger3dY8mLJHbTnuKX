<?
    require './header.php';
    $website_title = 'Заявки - Сделано Молодежью';
    require './head.php';
?>
<body>
<div class="wrapper_admin">
    <div class="admin_page">
        <?require 'admin_menu_left.php'?>

        <div class="right_side_block_admin">
            <table class='tbl_requests' id='tbl_requests'>
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Возраст</th>
                    <th>Телефон</th>
                    <th>Дата-время подачи</th>
                </tr>
                <?
                $sql = 'SELECT * FROM `requests_on_events` ORDER BY `id` DESC';
                $query = $pdo->prepare($sql);
                $query->execute();

                foreach($query as $order){
                    ?>  
                    <tr>
                        <td><?=$order['name_us']?></td>
                        <td><?=$order['surname_us']?></td>
                        <td><?=$order['age_us']?></td>
                        <td><?=$order['tel_us']?></td>
                        <td><?=date("d.m.Y h:i",strtotime($order['dateTimeReq']))?></td>
                    </tr>
                    <?
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="#" onclick="tableToExcel('tbl_requests')">Экспорт в Excel</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>
    var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,',
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function(s) {
        return window.btoa(unescape(encodeURIComponent(s)))
        },
        format = function(s, c) {
        return s.replace(/{(\w+)}/g, function(m, p) {
            return c[p];
        })
        }
    return function(table, name) {
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {
        worksheet: name || 'Worksheet',
        table: table.innerHTML
        }
        window.location.href = uri + base64(format(template, ctx))
    }
    })()
</script>
</body>
</html>