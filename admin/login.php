<?php 
  include 'classes/adminlogin.php';
  $class= new adminlogin();
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminUser=$_POST['adminUser'];
    $adminPass= md5($_POST['adminPass']);
    $login_check= $class->login_admin($adminUser,$adminPass);
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <section id="content">
      <form action="login.php" method="post">
        <h1>Admin Login</h1>
        <span>
          <?php 
           if(isset($login_check)) {
             echo $login_check;
           }
          ?>
        </span>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" placeholder="Username" name="adminUser" >
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" placeholder="Password" name="adminPass">
        </div>
        <div class="form-group">
          <input type="submit" value="Log in" />
        </div>
        
      </form>
      <div class="button">
        <a href="#"> Traiing with Live Project</a>
      </div>

    </section>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>