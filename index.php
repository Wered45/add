<?php 
include 'temp/headr.php';
$sql = 'select * from tovar join vid on tovar.id_vid = vid.id_vid';
$tovar = $conect->query($sql);
?>
<h3>Главная</h3>

<div class="row">
<?php while($row = $tovar->fetch_assoc()){?>    
<div class="card" style="width: 18rem;">
  <img src="<?=$row['img']?>" class="card-img-top" >
  <div class="card-body">
    <p class="text-center">Категория товара: <?=$row['name_vid']?></p>
    <h5 class="card-title"><?=$row['name_tovar']?></h5>
    <p class="card-text"><?=$row['price']?>.руб</p>
    <a href="client.php" class="btn btn-primary">Заказать</a>
  </div>
</div>
<?php }?>
</div>
<?php 
include 'temp/footer.php';
?>