<?php 
include 'temp/headr.php';
if (!isset($_SESSION['id_user']) || $_SESSION['id_role'] != 2) {
  header('Location: /');
  exit;
}
$sql = 'select * from tovar join vid on tovar.id_vid = vid.id_vid';
$vid = $conect->query($sql);
$sql_tovar = 'select * from tovar';
$tovar = $conect->query($sql_tovar);
if (isset($_POST['tovar'])) {
  $name_tovar = $_POST['name_tovar'];
  $opic = $_POST['opic'];
  $price = $_POST['price'];
  $img = $_POST['img'];
  $vid = $_POST['vid'];

  $sql = 'insert into tovar (name_tovar, opic, price, img, id_vid) values ("'.$name_tovar.'", "'.$opic.'", "'.$price.'", "'.$img.'", "'.$vid.'")';
  $conect->query($sql);
  header('Location:admin.php');
  exit;
}
if (isset($_POST['delet'])) {
  $id_tovar = $_POST['id_tovar'];
  $sql = 'delete from tovar where id_tovar = "'.$id_tovar.'"';
  $conect->query($sql);
  header('Location: admin.php');
  exit;
}
?>
<h3>Добавить товар</h3>

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите название товара</label>
    <input type="text" name="name_tovar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите описание</label>
    <input type="text" name="opic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите цену</label>
    <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите картинку</label>
    <input type="text" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
    <select class="form-select" name="vid" aria-label="Default select example">
      <option selected>Выбрать категорию товара</option>
      <?php while($row = $vid->fetch_assoc()){?>
        <option value="<?=$row['id_vid']?>"><?=$row['name_vid']?></option>
      <?php }?>  
    </select>
  <button type="submit" name="tovar" class="btn btn-primary">Добавить</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Название товара</th>
      <th scope="col">Описание</th>
      <th scope="col">Цена</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $tovar->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['name_tovar']?></th>
      <td scope="row"><?=$row['opic']?></td>
      <td scope="row"><?=$row['price']?></td>
      <td scope="row"><form method="post">
      <input type="hidden" name="id_tovar" class="form-control" value="<?=$row['id_tovar']?>">
      <button type="submit" name="delet" class="btn btn-danger">Удалить</button>
      </form>
</td>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php 
include 'temp/footer.php';
?>