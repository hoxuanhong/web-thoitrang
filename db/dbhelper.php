<?php
require_once('config.php');
function initDB($sql)
{
  //  Sử dụng cho các lệnh: insert, update, delete 
  $con = mysqli_connect(HOST, USERNAME, PASSWORD);
  mysqli_set_charset($con, 'utf8');
  // query 
  mysqli_query($con, $sql);
  // dong ket noi
  mysqli_close($con);
}

function execute($sql)
{
  // save data into table
  // open connection database
  $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  mysqli_set_charset($con, 'utf8');
  // insert, update, delete
  mysqli_query($con, $sql);
  // colse connection
  mysqli_close($con);
}

function executeResult($sql, $onlyOne = false)
{
  // save data into table
  // open connection database
  $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  // insert, update, delete
  $result = mysqli_query($con, $sql);
  if ($onlyOne) {
    $data = mysqli_fetch_array($result, 1);
  } else {
    $data = [];
    while (($row = mysqli_fetch_array($result, 1)) != null) {
      $data[] = $row;
    }
  }
  // close connection
  mysqli_close($con);
  return $data;
}

function executeResult1($sql, $onLyOne = false)
{
  // save data into table
  // open connection database
  $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  // insert, update, delete
  $result = mysqli_query($con, $sql);
  $data = [];
  if ($result != null) {
    while ($row = mysqli_fetch_array($result)) {
      $data[] = $row;
    }
  }

  // close connection
  mysqli_close($con);
  return $data;
}



function executeSingleResult($sql)
{
  // save data into table
  // open connection database
  $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  // insert, update, delete
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result, 1);
  // close connection
  mysqli_close($con);
  return $row;
}
