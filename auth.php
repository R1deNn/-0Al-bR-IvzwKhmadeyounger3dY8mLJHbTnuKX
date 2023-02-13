<?
    require './layout/header.php';
    $website_title = 'Авторизация - Сделано Молодежью';
    require './layout/head.php';
?>
<body>
    <div class="auth_wrapper">
        <form id="auth_form">
            <h1>вход в личный кабинет</h1>
            <p>электронная почта</p>
            <input type="email" name='email'>
            <p>пароль</p>
            <input type="password" name='pass'>
            <div class="auth_form_container slow_a">
                <div class="left_auth_form">
                    <a href="./reg.php">зарегистрироваться</a>
                </div>

                <div class="center_auth_form">
                    <button>войти</button>
                </div>

                <div class="right_auth_form">
                    <a href="#">забыли пароль?</a>
                </div>
            </div>

            <div id="error_block_auth"></div>
        </form>
    </div>

    <?require './layout/footer.php'?>
    <script src='./assets/js/auth.js'></script>
</body>
</html>