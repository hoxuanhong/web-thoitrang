<?php
require_once('../db/dbhelper.php');
require_once('utils/utility.php');

require_once('api/checkout-form.php');
include '../db/connect.php';
include_once('layouts/header.php');

$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];



// KT
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
  $sql2 = "select * from productshost where id in ($idList)";
  $cartList2 = executeResult($sql2);
  $cartList= array_merge($cartList1,$cartList2);
} else {
  $cartList = [];
}


?>
<!-- header  -->
<form method="post">
  <div class="container">
    <div class="row" style="margin-top:10px" >
      <div class="col-md-5">
        <h3 style="color:brown ;">Thông tin nhận hàng</h3>
        <!-- them uer -->
        <?php if (isset($user['email'])) { ?>
        <div class="form-group">
           <label for="usr">Name:</label>
         
            <input required="true" type="text" class="form-control" id="usr" name="fullname"  value=" <?php echo $user['name'] ?>" >
          
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input required="true" type="email" class="form-control" id="email" name="email" value=" <?php echo $user['email'] ?>"  >
        </div>
        <?php } else { ?>
          <div class="form-group">
           <label for="usr">Name:</label>
         
            <input required="true" type="text" class="form-control" id="usr" name="fullname">
          
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input required="true" type="email" class="form-control" id="email" name="email" >
        </div>
          <?php } ?>
          <!-- het  -->
        <div class="form-group">
          <label for="phone_number">Phone Number:</label>
          <input type="text" class="form-control" id="phone_number" name="phone_number">
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" class="form-control" id="address">
        </div>
        <div class="form-group">
          <label for="note">Note:</label>
          <textarea name="" id="" rows="3" id="note" name="note" style="width: 100%;"></textarea>
        </div>

      </div>
      <div class="col-md-7">
      <h3 style="color:brown ;margin-bottom: 40px;">Đơn hàng</h3>
        <table class="table table-bordered table-responsive">
          <thead>
            <th>No</th>
            <!-- <th>Thumbnail</th> -->
            <th>Title</th>
            <th>Num</th>
            <th>Price</th>
            <th>Total</th>

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
         
                <td>' . $item['title'] . '</td>
                <td>' . $num . '</td>
                <td>' . number_format($item['price'], 0, ',', ' .') . 'đ' . '</td>
                <td>' . number_format($num * $item['price'], 0, ',', ' .') . 'đ' . '</td>
           
            </tr>
            ';
            }

            ?>
          </tbody>


        </table>
        <p style="font-size: 30px; color:red;">
          Total: <?= number_format($total, 0, ',', ' .') . 'đ' ?>
        </p>

        <a href="">
          <button class="btn btn-success" style="width:100%; font-size:20px;">Complete</button>
        </a>
      </div>

    </div>
  </div>
</form>
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