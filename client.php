<?php 
include 'temp/headr.php';
if (!isset($_SESSION['id_user']) || $_SESSION['id_role'] != 1) {
  header('Location: /');
  exit;
}
if (isset($_POST['order'])) {
    $name_order = $_POST['name_order'];
    $date = $_POST['date'];
    $price = $_POST['price'];

    $sql = 'insert into orders (name_order, date, price, id_user) values ("'.$name_order.'", "'.$date.'", "'.$price.'", "'.$_SESSION['id_user'].'")';
    $conect->query($sql);
    header('Location: client.php');
    exit;
}

$sql_user = 'select * from orders where id_user = "'.$_SESSION['id_user'].'"';
$order = $conect->query($sql_user);
?>
<h3>Клиент</h3>

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите название услуги</label>
    <input type="text" name="name_order" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите дату</label>
    <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите цену</label>
    <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="order" class="btn btn-primary">Составить</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Название услуги</th>
      <th scope="col">Дата</th>
      <th scope="col">Цена</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $order->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['name_order']?></th>
      <th scope="row"><?=$row['date']?></th>
      <th scope="row"><?=$row['price']?></th>
      <th scope="row"><?=$row['status']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php 
include 'temp/footer.php';
?>