<?
    require './layout/header.php';
    $website_title = 'Регистрация - Сделано Молодежью';
    require './layout/head.php';
?>
<body>
    <div class="auth_wrapper">
        <form id="reg_form" class="slow_a">
            <h1>регистрация</h1>
            <p>имя</p>
            <input type="text" name='username'>
            <p>фамилия</p>
            <input type="text" name='surname'>
            <p>электронная почта</p>
            <input type="email" name='email'>
            <p>пароль</p>
            <input type="password" name='pass'>
            <p>Внимание! Пароль должен содержать хотя бы одну прописную и одну строчную букву, а также цифру.</p>
            <button>зарегистрироваться</button>
            <p>Уже есть учетная запись? <a style="color: #823CB5" href="./auth.php">войти</a></p>
            <div id="error_block"></div>
        </form>
    </div>

    <?require './layout/footer.php'?>
    <script src='./assets/js/reg.js'></script>
</body>
</html>