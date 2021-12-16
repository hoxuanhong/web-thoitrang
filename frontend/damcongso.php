<?php
require_once('../db/dbhelper.php');
require_once('utils/utility.php');
include '../db/connect.php';
include_once('layouts/header.php');

$search = isset($_GET['name']) ? $_GET['name'] : "";
if ($search) {
  $where = "WHERE `title` LIKE '%" . $search . "%'";
}

$item_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 16;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;

// var_dump($item_page);
$offset = ($current_page - 1) * $item_page;
if ($search) {
  // echo 1111;exit;
  $productList = executeResult("select * from productshost WHERE title LIKE '%" . $search . "%' order by id ASC LIMIT " . $item_page . " OFFSET " . $offset);
  $totalRecords = mysqli_query($con, "select * from productshost  WHERE title LIKE '%" . $search . "%' ");
} else {
  // echo 2222;exit;
  $productList = executeResult("select * from productshost order by id ASC LIMIT " . $item_page . " OFFSET " . $offset);
  $totalRecords = mysqli_query($con, 'select * from productshost ');
}
// print_r($productList);exit;

$totalRecords = $totalRecords->num_rows;
$totalPage = ceil($totalRecords / $item_page);

?>




<!-- header  -->
<div class="container ">
  <div class="row">
  <form id="search" method="GET">
      <label for="">Tìm kiếm sản phẩm</label>
      <input id="product-search" style="width:300px" type="text" value="<?= isset($_GET['name']) ? $_GET['name'] : ""; ?>" name="name">
  
      <button type="submit" class="btn btn-danger" ><i class="fa fa-search"  aria-hidden="true" ></i></button>
    </form>
  </div>
  <div class="row">
    <?php
    include_once('layouts/thanhsp.php');
    ?>
  </div>

  <!-- <div class="row"> -->
  <div class="row">
    <?php
    foreach ($productList as $item) {
      echo ' <div class="col-md-3 col-6" id="hinhsp">
      <a href="detailhost.php?id=' . $item['id'] . '"><img src="' . $item['thumbnail'] . '" alt="" style="width: 100%; height:350px"></a>
      <i id="hinhsao" class="fa fa-heart" aria-hidden="true"></i>
      <i id="sao">20%</i>
      <p></p>
      <a href="detailhost.php?id=' . $item['id'] . '"><p>' . $item['title'] . '</p></a>
      <div class="price">
      <span class="a" style="color: red; font-size: 20px;" >
       ' . number_format($item['price'], 0, ',', ' .') . 'đ 
      </span>
      <span class="a" style="text-decoration-line:line-through;" >
       ' . number_format($item['discount'], 0, ',', ' .') . 'đ
      </span>
      </div>
   </div>';
    }

    ?>




  </div>

  <?php
  include_once('pagination.php');
  ?>
  <div class="row" style="height: 30px;"></div>

</div>



<?php
include_once('layouts/kfooter.php');
?>

</div>


<?php

include_once('layouts/footer.php');
?>
<!-- footer  -->