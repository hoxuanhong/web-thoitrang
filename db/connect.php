<?php
// ket noi voi co so du lieu

$con= mysqli_connect('localhost','root','','thoitrang');

// Neu ket noi khong thanh cong thi show ra loi
    if(!$con)
        {
            echo 'Ket noi khong thanh cong';
        }
    else
    {
        mysqli_set_charset($con,'utf8');
        // echo 'Ket noi thanh cong';
      
    }
    if(!isset($_SESSION)) { 
      session_start(); 
    } 
// if(mysqli_connect_error() ) {
//   echo 'connectsion fail:'.mysqli_connect_error(); exit;
// }

?>