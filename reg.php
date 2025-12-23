<?php 
include 'temp/headr.php';
if (isset($_POST['reg'])) {
    $fio = $_POST['fio'];
    $phone = $_POST['phone'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (preg_match('/[а-яА-Я\s]+/u',$fio)) {
        if (strlen($login) >= 8) {
            if (strlen($password) >= 6) {
                if (preg_match('/^8\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/',$phone)) {
                    $sql = 'insert into users (fio, phone, login, password, id_role) values ("'.$fio.'", "'.$phone.'", "'.$login.'", "'.$password.'", 1)';                    
                    $conect->query($sql);
                    header('Location: auto.php');
                    exit;
                }else{
                    echo 'Ошибка ввода телефона!';
                }
            }else{
            echo 'Пароль слишком маленький!';
        }
        }else{
            echo 'Логин слишком маленький!';
        }
    }else{
        echo 'Ф.И.О. не написаны на кирилице!';
    }
}
?>
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите Ф.И.О.</label>
    <input type="text" name="fio" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите телефон</label>
    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите логин</label>
    <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите пароль</label>
    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="reg" class="btn btn-primary">Зарегистрироваться</button>
</form>
<?php 
include 'temp/footer.php';
?>