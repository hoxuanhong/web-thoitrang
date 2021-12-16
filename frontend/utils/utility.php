<?php 
function RemoveSpecial($str) {
    $str= str_replace('\\','\\\\',$str);
    $str= str_replace('\'','\\\'',$str);
    return $str ;
}

function getPost($key) {
    $value='';
    if(isset($_POST[$key])) {
        $value= $_POST[$key];
    }
    return RemoveSpecial($value);
}

function getGet($key) {
    $value='';
    if(isset($_GET[$key])) {
        $value= $_GET[$key];
    }
    return RemoveSpecial($value);
}


?>