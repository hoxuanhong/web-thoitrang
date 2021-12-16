<?php
include '../db/connect.php';
$err = [];

if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rPassword = $_POST['rPassword'];
  if (empty($_POST['name'])) {
    $err['name'] = 'Bạn chưa nhập tên';
  }
  if (empty($_POST['email'])) {
    $err['email'] = 'Bạn chưa nhập email';
  }
  if (empty($_POST['password'])) {
    $err['password'] = 'Bạn chưa nhập mật khẩu';
  }
  if ($rPassword != $password) {
    $err['rPassword'] = 'Mật khẩu nhập lại không đúng';
  }
  //var_dump(!empty($err));
  //die();
  if (empty($err)) {
    $pass = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($pass);
    // die();
    $sql = "insert into users(name,email,password) values('$name','$email','$pass')";
    $query = mysqli_query($con, $sql);
    if ($query) {
      header('Location:login.php');
    }
  }
}
include_once('layouts/header.php');
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style type="text/css">
    .error {
      color: red;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="" method="POST" role="form">
          <legend>Đăng ký tài khoản</legend>
          <div class="form-group">
            <label for="">Tên người dùng:</label>
            <input type="text" class="form-control" placeholder="Enter email" name="name" id="">
            <div class="error">
              <span> <?php echo (isset($err['name'])) ? $err['name'] : '' ?> </span>
            </div>
          </div>

          <div class="form-group">
            <label for="">Email:</label>
            <input type="email" class="form-control" placeholder="Enter password" name="email" id="">
            <div class="error">
              <span> <?php echo (isset($err['email'])) ? $err['email'] : '' ?> </span>
            </div>
          </div>
          <div class="form-group">
            <label for="">Mật khẩu:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password" id="">
            <div class="error">
              <span> <?php echo (isset($err['password'])) ? $err['password'] : '' ?> </span>
            </div>
          </div>
          <div class="form-group">
            <label for="">Nhập lại mật khẩu:</label>
            <input type="password" class="form-control" placeholder="Enter RePassword" name="rPassword" id="">
            <div class="error">
              <span> <?php echo (isset($err['rPassword'])) ? $err['rPassword'] : '' ?> </span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>
  </div>

  <?php 
  include_once('layouts/footer.php');
?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>