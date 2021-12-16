<?php 
	require_once('../../db/dbhelper.php');
require_once('../../frontend/utils/utility.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
  .page-item {
      padding: 10px;
      border: 1px solid blue;
      background-color: white;
    }

    .current-item {
      padding: 10px;
      color: white;
      border: 1px solid blue;
      background-color: black;
    }

    #pagination {
      float: right;
      margin-bottom: 20px;
    }
</style>

</head>
<body>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link " href="../category/">Quản Lý Danh Mục</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="../product/">Quản Lý Sản Phẩm</a>
		</li>
    <li class="nav-item">
			<a class="nav-link active " href="../producthost/">Quản Lý Sản Phẩm Mới</a>
		</li>
	</ul>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
			</div>
			<div class="panel-body">
			<a href="add.php"><button class="btn btn-success" style="margin-bottom: 15px;">Them Sản Phẩm</button></a>
			<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="60px" >STT</th>
                            <th>Hình Ảnh</th>
							<th>Tên Sản Phẩm</th>
                            <th width="100px">Giá Bán</th>
                            <th  width="100px" >Giá Giảm</th>
                            <th>Danh Mục</th>
                            <th>Ngày cập nhật</th>
							<th width="60px" ></th>
							<th width="60px" ></th>
						</tr>
					</thead>
					<tbody>

<?php 
// phan trang 
include '../../db/connect.php';
$item_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;

// var_dump($item_page);
$offset = ($current_page - 1) * $item_page;


   
  $productList = executeResult( "select productshost.id, productshost.title, productshost.price,productshost.discount, productshost.thumbnail, productshost.update_at, category.name category_name  from productshost left join category on productshost.id_category = category.id  order by id ASC LIMIT " . $item_page . " OFFSET " . $offset);
 
  // $productList = executeResult($sql);
  $totalRecords = mysqli_query($con, "select * from products ");
  $totalRecords = $totalRecords->num_rows;
  $totalPage = ceil($totalRecords / $item_page);

	$index = 1;
	foreach ($productList as $item) {
		echo 	'<tr>
					<td>'.$item['id'].'</td>
                    <td><img src="'.$item['thumbnail'].'"  style="max-width:100px" ></td>
                    <td>'.$item['title'].'</td>
                    <td>'.$item['price'].'đ</td>
                    <td>'.$item['discount'].'đ</td>
                    <td>'.$item['category_name'].'</td>
                    <td>'.$item['update_at'].'</td>
					<td>
						<a href="add.php?id='.$item['id'].'">
						<button class="btn btn-warning">Sua</button>
						</a>
					</td>
					<td>
						<button onclick="deleteProduct('.$item['id'].')" class="btn btn-danger">Xoa</button>
					</td>
				</tr>';
	}

?>


						
					</tbody>
			</table>
      <?php
    include_once('./panagition.php');
  ?>
			</div>
		</div>
	</div>

<script>
	function deleteProduct(id) {
		var option= confirm('Ban co chac chan muon xoa khong?') ;
		if (!option) {
			return
		}
		console.log(id);
		$.post('ajax.php', {
			'id':id,
			'action': 'delete'
		}, function (data) {
			location.reload()
		})

	}
</script>

</body>
</html>