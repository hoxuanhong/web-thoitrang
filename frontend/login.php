<?php

include '../db/connect.php';



if (isset($_POST['email'])) {
  $email = $_POST['email'];
 
  $password = $_POST['password'];
 
  $sql =  " Select * from users where email = '$email'";
  $query = mysqli_query($con, $sql);
  $data = mysqli_fetch_assoc($query);
  // var_dump($query);
  $checkEmail = mysqli_num_rows($query);
  var_dump($checkEmail);
  // var_dump($data);

  if ($checkEmail == 1) {
    // echo $data['password'];
    // echo "</br>";
    // echo $password;
    $checkPass = password_verify($password, $data['password']);
    var_dump($checkPass);
    if ($checkPass) {
      // luu vao sesstion 
      $_SESSION['user'] = $data;
      // header('location: ../layouts/header.php');
      header('Location: index.php');
    
    } else {
      echo 'Sai mật khẩu';
    
    }
  } else {
    echo 'email khong ton tai';

  }
 
}

include_once('layouts/header.php');

?>


  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="" method="POST" role="form">
          <legend>Đăng Nhập</legend>
          <div class="form-group">
            <label for="">Email:</label>
            <input type="email" class="form-control" placeholder="Enter password" name="email" id=""  >

          </div>
          <div class="form-group">
            <label for="">Mật khẩu:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password" id="">

          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>
  </div>
<?php 
  include_once('layouts/footer.php');
?>