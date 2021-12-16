<?php
require_once('../../db/dbhelper.php');
 

$id = $title = $thumbnail = $content = $id_category = '';
if (!empty($_POST)) {

  if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $title = str_replace('"', '\\"', $title);
  }
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
  }
  if (isset($_POST['price'])) {
    $price = $_POST['price'];
    $price = str_replace('"', '\\"', $price);
  }
  if (isset($_POST['discount'])) {
    $discount = $_POST['discount'];
    $discount = str_replace('"', '\\"', $discount);
  }
  if (isset($_POST['thumbnail'])) {
    $thumbnail = $_POST['thumbnail'];
    $thumbnail = str_replace('"', '\\"', $thumbnail);
  }

  if (isset($_POST['content'])) {
    $content = $_POST['content'];
    $content = str_replace('"', '\\"', $content);
  }
  if (isset($_POST['id_category'])) {
    $id_category = $_POST['id_category'];
  }



  if (!empty($title)) {
    $created_at = $update_at = date('Y-m-d H:s:i');
    if ($id == '') {
      $sql = 'insert into products(title,thumbnail,price,discount,content,id_category, created_at, update_at) values("' . $title . '","' . $thumbnail . '","' . $price. '","' . $discount. '","' . $content . '","' . $id_category . '", "' . $created_at . '","' . $update_at . '" ) ';
    } else {
      $sql = 'update products set title = "' . $title . '", update_at="' . $update_at . '", thumbnail="' . $thumbnail . '", price="' . $price . '", discount="' . $discount. '", content="' . $content . '", id_category="' . $id_category . '" where id= ' . $id;
    }
    execute($sql);
    // Luu vào database

    header('Location: index.php');
    die();
  }
}


if (isset($_GET['id'])) {
  $id = (int) $_GET['id'];
  $sql = 'select * from products where id=' . $id;
  $product = executeSingleResult($sql);
  if ($product != null) {
    $title = $product['title'];
    $price = $product['price'];
    $discount = $product['discount'];
    $thumbnail = $product['thumbnail'];
    $content = $product['content'];
    $id_category = $product['id_category'];
  }
}



?>
<!DOCTYPE html>
<html>

<head>
  <title>Them/Sua San Pham</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- summer note  -->
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="../category/">Quản Lý Danh Mục</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../index.php">Quản Lý Sản Phẩm</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../producthost/">Quản Lý Sản Phẩm Mới</a>
    </li>
  </ul>
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h2 class="text-center">Thêm/Sửa Sản Phẩm</h2>
      </div>
      <div class="panel-body">
        <form action="" method="post" role="form">
          <div class="form-group">
            <label for="name">Tên Sản Phẩm:</label>
            <input type="text" name="id" value="<?= $id ?>" hidden="true">
            <input required="true" type="text" class="form-control" id="title" name="title" value="<?= $title ?>">
          </div>
          <div class="form-group">
            <label for="">Chon Danh Muc:</label>
            <select class="form-control" name="id_category" value="<?= $id_category ?>" id="id_category">
              <option>---Lựa chọn danh mục---</option>
              <?php
              $sql = 'select * from category';
              $categoryList = executeResult($sql);
              foreach ($categoryList as $item) {
                if ($item['id'] == $id_category) {
                  echo '<option selected value="' . $item['id'] . '" >' . $item['name'] . '</option>';
                } else {
                  echo '<option value="' . $item['id'] . '" >' . $item['name'] . '</option>';
                }
              }

              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="price">Giá bán:</label>
            <input required="true" type="number" class="form-control" id="price" name="price" value="<?= $price ?>">
          </div>
          <div class="form-group">
            <label for="price">Giảm giá:</label>
            <input required="true" type="number" class="form-control" id="discount" name="discount" value="<?= $discount ?>">
          </div>
          <div class="form-group">
            <label for="thumbnail">Thumb nail:</label>
            <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?= $thumbnail ?>" onchange="updateThumbnail()">
            <img src="<?= $thumbnail ?>" id="img_thumbnail" style="max-width:200px;">
          </div>
          <div class="form-group">
            <label for="content">Nội dung:</label>
            <textarea class="form-control" rows="5" id="content" name="content"> <?= $content ?> </textarea>
          </div>
          <button class="btn btn-primary">Lưu</button>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function updateThumbnail() {
      $('#img_thumbnail').attr('src', $('#thumbnail').val())
    }
    $(function() {
      //  doi website load noi dung, moi xu ly phan js
      $('#content').summernote();
    })
  </script>
</body>

</html>