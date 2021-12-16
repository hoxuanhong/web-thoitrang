<?php 
	require_once('../../db/dbhelper.php');
  require_once('../../frontend/utils/utility.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Danh Mục</title>
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
      padding: 8px;
      border: 1px solid blue;
      background-color: white;
    
    }
    

    .current-item {
      padding: 8px;
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
			<a class="nav-link active " href="#">Quản Lý Danh Mục</a>
		</li>
		<li class="nav-item  ">
			<a class="nav-link" href="../product/">Quản Lý Sản Phẩm</a>
		</li>
    <li class="nav-item  ">
			<a class="nav-link" href="../producthost/">Quản Lý Sản Phẩm mới</a>
		</li>
	</ul>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Danh Mục</h2>
			</div>
			<div class="panel-body">
			<a href="add.php"><button class="btn btn-success" style="margin-bottom: 15px;">Them Danh Muc</button></a>
			<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="60px" >STT</th>
							<th>Ten Danh Muc</th>
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
	// Lay danh sach danh muc tu database
  // $sql= 'select * from category order by id ASC LIMIT " . $item_page . " OFFSET " . $offset';

	$categoryList = executeResult("select * from category order by id ASC LIMIT " . $item_page . " OFFSET " . $offset);
  $totalRecords = mysqli_query($con, "select * from products ");
  $totalRecords = $totalRecords->num_rows;
  $totalPage = ceil($totalRecords / $item_page);
	$index = 1;
	foreach ($categoryList as $item) {
		echo 	'<tr>
					<td>'.$item['id'].'</td>
					<td>'.$item['name'].'</td>
					<td>
						<a href="add.php?id='.$item['id'].'">
						<button class="btn btn-warning">Sua</button>
						</a>
					</td>
					<td>
						<button onclick="deleteCategory('.$item['id'].')" class="btn btn-danger">Xoa</button>
					</td>
				</tr>';
	}

?>

						
					</tbody>
			</table>
				<?php   include_once('../product/panagition.php'); ?>
			</div>
		</div>
	</div>

<script>
	function deleteCategory(id) {
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