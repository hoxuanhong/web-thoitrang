<?php 
	require_once('../../db/dbhelper.php');
	$id = $name ='';
	if(!empty($_POST)) {
		$name='';
		if(isset($_POST['name'])) {
			$name= $_POST['name'];
			$name = str_replace('"','\\"',$name);
		}
		if(isset($_POST['id'])) {
			$id= $_POST['id'];
		}
		if(!empty($name)) {
			$created_at= $update_at= date ('Y-m-d H:s:i');
			if ($id=='') {
				$sql= 'insert into category(name, created_at, update_at) values( " '.$name.' ","'.$created_at.'","'.$update_at.'" ) ';
			}
			else {

				$sql= 'update category set name = "'.$name.'", update_at="'.$update_at.'" where id= '.$id;
			}
			execute($sql);

			// Luu vào database
			
			header('Location: index.php');
			die() ;
		}
	}

	
	if(isset($_GET['id'])) {
		$id =(int) $_GET['id'];
		$sql= 'select * from category where id='.$id ;
		$category = executeSingleResult($sql);
		if($category != null) {
			$name = $category['name'];
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Them/Sua Danh Muc San Pham</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link" href="index.php">Quản Lý Danh Mục</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="../product/">Quản Lý Sản Phẩm</a>
		</li>
    <li class="nav-item">
			<a class="nav-link" href="../productshost/">Quản Lý Sản Phẩm Mới</a>
		</li>
	</ul>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Danh Mục Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<form action="" method="post" role="form" >
					<div class="form-group">
						<label for="name">Tên Danh Mục:</label>
						<input type="text" name="id" value="<?=$id?>">
						<input required="true" type="text" class="form-control" id="name" name="name"  value="<?=$name?>" >
					</div>
					<button class="btn btn-success">Lưu</button>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>