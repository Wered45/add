<nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
        </li>
        <?php
        if (!isset($_SESSION['id_user'])) {
        ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="reg.php">Регистрация</a>
        </li>
        <?php }?>
        <?php 
        if (isset($_SESSION['id_user']) && $_SESSION['id_role'] == 1) {
            echo '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="client.php">Клиент</a>
        </li>'; 
        }
        if (isset($_SESSION['id_user']) && $_SESSION['id_role'] == 2) {
            echo '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php">Админ</a>
        </li>'; 
        }
        ?>
      </ul>
      <?php
      if (isset($_SESSION['id_user'])) {
        echo '<div>
        <a class="btn btn-outline-dark" href="logout.php" type="submit">Выход</a>
      </div>';
      }else{
        echo '<div>
        <a class="btn btn-outline-dark" href="auto.php" type="submit">Войти</a>
      </div>';
      }
      ?>
    </div>
  </div>
</nav>