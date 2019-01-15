<?php
function Connection(){
$connect=mysqli_connect("localhost","root","","D_Code");
if ($connect->connect_error) {
   die("Connection failed: " . $connect->connect_error);
}
  return $connect;
}
?>