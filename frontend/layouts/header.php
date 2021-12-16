<?php
include '../db/connect.php';
//  $user = $_SESSION['user'];
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
?>
<!-- b4-$  -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="on, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">



  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.6.0/cerulean/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- bia  -->




  <style type="text/css">
    /* kfooter */
    .hinhhi img:hover {
      z-index: 1;
      height: 250px;
      transition: 1s;
      padding: 10px;
      border-radius: 10px;
      width: auto !important;
      max-height: 100%;
      position: relative;


    }
    .hinhhi img{
      text-align: center;
      margin-left: 23%;
    }

    /* kfooter */

    #hong{
      color: #111111;
      margin-right: 80px;
      font-weight: bold;
      font-family: 'Times New Roman', Times, serif;
      font-size: 18px;

    }
    #hinhsp img:hover{
     
      transition-duration: 1s;
      box-shadow:  1px 0px 1px 0px pink;
      box-sizing: border-box;

    overflow: hidden;
    position: relative;
 
    display: flex;
    justify-content: center;
    border-top-left-radius: 120px; border-bottom-right-radius: 120px; border-top-right-radius: 15px; border-bottom-left-radius: 10px;
    -webkit-transform:scale(1.05); transform:scale(1.05);
  

    }

    a:hover {
      background: #ff0000;
      color: #fff;
      transition-duration: 1s;
    }

    /* header  */
    #header {
      /* background-color: #99CC99; */
      background-color:salmon;
    }

    .page-item {
      padding: 10px;
      border: 1px solid blue;
      background-color: white;
    }
    .page-item2 {
      
      padding: 8px;
      border: 1px solid brown;
      background-color: white;
     
    }
    #size a:hover{
      background-color: yellow;
    }
    #size{
      margin-bottom: 30px;
      
     
    }
  
   
    .btn-callmeback {
    border: none !important;
    outline: none;
    box-shadow: none;
    padding: 0;
    font-size: 2px;
    margin-left: 10px;
    min-width: 0px;
    text-align: left;
    font-weight: normal;
    background-color: transparent;
    text-decoration: underline;
    color: #333f48;
}

    #pagination {
      float: right;
      margin-bottom: 20px;
    }

    .footer {
      margin-top: 20px;
    }

    /* them icon  */
    .wrapper-home-service .service-box .icon {
      display: inline-block;
      position: relative;
      margin-bottom: 15px;
      width: 55px;
      height: 55px;
      font-size: 0;
      line-height: 55px;
      text-decoration: none;
    }

    .wrapper-home-service .service-box .icon:before {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      width: 100%;
      height: 100%;
      margin-top: -50%;
      margin-left: -50%;
      border-radius: 100px;
      background-color: #1f2027;
      transition: all 400ms;
    }
    /* #listsp,
    #textinfo  */
    body{
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
      color: #333f48;
    }


    #danhsach {
      margin-left: 30px;
    }

    #dscon {
      margin: 10px;
    }
    
#hinhsao{
    position: absolute;
    top:-20px;
    left: -7px;
    color: red;
    font-size: 45px;
}
#sao{
    position: absolute;
    top:-17px;
    left: 0px;
    color: white;
    font-size: 18px;
}
span .a{
  display: inline;
  width: 100px;
  text-decoration-line:line-through;
}
.price{
  margin-bottom: 30px;
}

/* dt  */
.btn-call-now {
    width: initial;
    padding: 5px;
}
.btn-call-now {
    display: flex;
    align-items: center;
    position: fixed;
    bottom: 100px;
    top: initial !important;
    background: rgba(183,1,0,0.7);
    -webkit-box-shadow: 0 0 5px #ddd;
    -moz-box-shadow: 0 0 5px #ddd;
    box-shadow: 0 0 5px #ddd;
    z-index: 99;
    left: 10px;
    color: #FFF;
    font-weight: 700;
    font-size: 100%;
    border-radius: 25px;
    padding: 5px 15px 5px 5px;
    -moz-animation-duration: 500ms;
    -moz-animation-name: calllink;
    -moz-animation-iteration-count: infinite;
    -moz-animation-direction: alternate;
    -webkit-animation-duration: 500ms;
    -webkit-animation-name: calllink;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-direction: alternate;
    animation-duration: 500ms;
    animation-name: calllink;
    animation-iteration-count: infinite;
    animation-direction: alternate;
}
#giohang{
  margin-top: 20px;
  text-align: center;
 
}
#thongtin :hover{
  color: brown;
}
#textinfo{
  color: #111111;
  margin-left: 85px;
}
#danhsach{
  color: #FFFFCC;
}
.shopping-mall{
    font-family:Impact ;
    font-size: 40px;
    color: brown;
    letter-spacing: 0-2px;
    text-shadow: 2px 2px 2px plum;
    /* border-bottom: 1px dotted purple; */
    padding-bottom: 0;
    margin-left: 40px;
    margin-bottom: 20px;
}
.fa-search{
  border: none;
  width: 50px;

}
#product-search{
  padding-bottom: 5px;

}

#search{
      text-align: center;
      margin-left: 20%;
      border-radius: 0px 10px 10px 0px;
      background-color: palevioletred;
      color: #000;
      padding-left: 5px;
    }

   
  </style>
  <title>Products</title>
</head>

<body>
  <div class="row" id="header">
    <div class="col-md-5" id="giohang">
    <div class="row">
     <marquee style="margin-bottom: 10px; color:purple" width="80%" >
      7 ngày đổi mẫu/size thoải mái
      </marquee>
     </div>
     <div class="row">
       <h2 class="shopping-mall" >Cửa Hàng Thời Trang Nữ </h2>
     </div>
    </div>
    <div class="col-md-2">
      <img src="https://www.beeart.vn/uploads/file/images/blog/thiet-ke-logo-thoi-trang/thiet-ke-logo-thoi-trang-01.jpg" width="70%" alt="">
    </div>
    <div class="col-md-5" id="giohang">
    <ul class="nav navbar-nav navbar-right" style="color: black; margin-top: 15px;">

        <?php if (isset($user['email'])) { ?>
          <li class="dropdown">
            <a href="#" class=" dropdown-toggle" data-toggle="dropdown" style="color:black;"> <?php echo $user['email'] ?> <b class="caret"></b> </a>
            <ul class="dropdown-menu" style="color: red;">
              <li><a href="logout.php">Đăng xuất</li>
            </ul>

          <?php } else { ?>
          <li class="dropdown">
            <i class="fa fa-user" aria-hidden="true"></i>
           
            <a style="text-decoration: none; padding:10px;" href="#" id="hong" class=" dropdown-toggle" data-toggle="dropdown">Tài Khoản <b class="caret"></b> </a>
            <ul class="dropdown-menu" style="color: red;">
              <li><a href="dangky.php">Đăng ký</a></li>
              <li><a href="login.php">Đăng nhập</a></li>
              <li><a href="#">Separated Link</li>
            </ul>
          <?php } ?>

      </ul>

      <?php
      $cart = [];
      if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
      }
      $count = 0;
      foreach ($cart as $item) {
        $count += $item['num'];
      }
      ?>
      <a href="cart.php">
        <button type="button" style="position:absolute; right: 20px; border:none; top:5px; background-color: #FFFFCC; color: white; ">
          <img src="https://www.tnc.com.vn/uploads/weblink/header-icon-cart.png" alt="" width="30px"> <span class="badge badge-light" style="font-size: 20px;"><?= $count ?> </span>
        </button>
      </a>
    </div>
  </div>
  <!-- Grey with black text -->
  <nav class="navbar navbar-expand-sm navbar-dark " style="background-color:#FFFFCC;">
    <div class="container">

      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" id="hong" href="index.php">Trang Chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="hong" href="gioithieu.php">Giới Thiệu</a>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link" id="hong" href="products.php">Sản Phẩm</a> -->
          <div class="dropdown">
            <a style=" padding: 7px; text-decoration: none; " type="button" id="hong"  href="products.php" class=" dropdown-toggle" data-toggle="dropdown">
             Sản Phẩm
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="products.php">Váy/Đầm</a>
              <a class="dropdown-item" href="damcongso.php">Đầm công sơ</a>
              <a class="dropdown-item" href="damcongso.php">Hàng mới về</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link " id="hong" href="tintuc.php">Tin Tức</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="hong" href="#">Tuyển dụng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="hong" href="lienhe.php">Liên Hệ</a>
        </li>
      </ul>


     
    </div>

  </nav>