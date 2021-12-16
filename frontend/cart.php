<?php
require_once('../db/dbhelper.php');
require_once('utils/utility.php');
include_once('layouts/header.php');
$cart = [];
if (isset($_COOKIE['cart'])) {
  $json = $_COOKIE['cart'];
  $cart = json_decode($json, true);
}
$idList = [];
foreach ($cart as $item) {
  $idList[] = $item['id'];
}
if (count($idList) > 0) {
  $idList = implode(',', $idList);
  $sql1 = "select * from products where id in ($idList)";
  $cartList1 = executeResult($sql1);
  $sql2= "select * from productshost where id in ($idList)";
  $cartList2 = executeResult($sql2);
  
  // tem
  $cartList = array_merge($cartList1, $cartList2);
  //tem

} else {
  $cartList = [];
}


?>
<!-- header  -->

<div class="container">
  <div class="row">

    <div class="col-md-12">
      <table class="table table-bordered table-responsive" style="overflow-x:auto;">
        <thead>
          <th>No</th>
          <th>Thumbnail</th>
          <th>Title</th>
          <th>Num</th>
          <th>Price</th>
          <th>Total</th>
          <th></th>
        </thead>
        <tbody>
          <?php
          $count = 0;
          $total = 0;
          foreach ($cartList as $item) {
            $num = 0;
            foreach ($cart as $value) {
              if ($value['id'] == $item['id']) {
                $num = $value['num'];
                break;
              }
            }
            $total += $num * $item['price'];
            echo '
            <tr>
                <td>' . (++$count) . '</td>
                <td> <img src="' . $item['thumbnail'] . '" style="height:100px; " alt=""> </td>
                <td>' . $item['title'] . '</td>
                <td>' . $num . '</td>
                <td>' . number_format($item['price'], 0, ',', ' .') . 'đ' . '</td>
                <td>' . number_format($num * $item['price'], 0, ',', ' .') . 'đ' . '</td>
                <td> <button class="btn btn-danger" onclick="deleteCart(' . $item['id'] . ')" >Delete</button> </td>
           
            </tr>
            ';
          }

          ?>
        </tbody>



      </table>
      <p style="font-size: 30px; color:red;">
        Total: <?= number_format($total, 0, ',', ' .') . 'đ' ?>
      </p>

      <a href="checkout.php">
        <button class="btn btn-success" style="width:100%; font-size:20px;">Checkout</button>
      </a>
    </div>

  </div>
</div>

<!-- body  -->
<script type="text/javascript">
  function deleteCart(id) {
    $.post('api/cookie.php', {
      'action': 'delete',
      'id': id
    }, function(data) {
      location.reload()
    })
  }
</script>
<?php
include_once('layouts/footer.php')
?>
<!-- footer  -->