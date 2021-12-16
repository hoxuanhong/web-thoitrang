<?php
require_once('../db/dbhelper.php');
require_once('utils/utility.php');
include_once('layouts/header.php');


$id = getGet('id');
$product = executeResult('select * from products where id=' . $id, true);
if ($product == null) {
  header('Location: products.php');
  die();
}
?>
<!-- header  -->
<div class="container">
  <div class="row">
    <div class="col-md-5">
      <img style="width:100%" src="<?= $product['thumbnail'] ?>" alt="">
    </div>
    <div class="col-md-7">
      <p style="color: black; font-size: 30px;font-weight: bold;"><?= $product['title'] ?></p>
      <p style="color: red; font-size: 30px;font-weight: bold;"><?= number_format($product['price'], 0, ',', ' .') . 'đ' ?></p>
      <p>Tiết kiệm: <i style="color: red;"> <?= number_format($product['discount'], 0, ',', ' .') . 'đ' ?></i></p>
      <p>Tình trạng: Còn hàng</p>
      <div id="size" >
        Kích thước:
    <button class="btn-callmeback" type="button" data-toggle="modal" data-target="#myModalCall"><img src="//bizweb.dktcdn.net/100/386/296/themes/763933/assets/product_size.svg?1625645055725" alt="Tham Chiếu Kích Thước"> Tham Chiếu Kích Thước</button>
      <a class="page-item2" >S</a>
      <a class="page-item2" style="background-color: palegoldenrod;" >M</a>
      <a class="page-item2" >L</a>
      <a class="page-item2" >XL</a>
      <a class="page-item2" >XXL</a>
      </div>
      <button style="width: 60%;font-size: 20px; " onclick="addToCart(<?= $id ?>)" class="btn btn-success">Add to cart</button>
      <!-- them  -->
      
      <!-- them  -->
    </div>
    <div class="col-md-12">
      <?= $product['content'] ?>
    </div>

  </div>
</div>
<!-- body  -->
<script type="text/javascript">
  function addToCart(id) {
    $.post('api/cookie.php', {
      'action': 'add',
      'id': id,
      'num': 1
    }, function(data) {
      location.reload()
    })
  }
</script>
<?php
include_once('layouts/footer.php')
?>
<!-- footer  -->