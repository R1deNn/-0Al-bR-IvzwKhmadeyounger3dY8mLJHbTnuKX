<?session_start();?>
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">

  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Опции</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./admin_panel.php">Главная админ-панели</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Список пользователей</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Добавить товар</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Добавить мероприятие или новость</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Управление товарами</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Управление новостями</a>
          </li>
        </ul>
      </div>
    </div>

    <a class="navbar-brand" href="../index.php"><img src='../assets/img/logo.svg'></a>
  </div>
</nav>
    <script src='../assets/js/bootstrap.js'></script>