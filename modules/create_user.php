<?php
session_start();
include("connection/connection.php");
$conn = Connection();
$clgname = "srmist";
$name = $_REQUEST['name'];
$username = $_REQUEST['empcode'];
$password = md5($_REQUEST['password']);
$status = "Data not uploaded";
$arr = array();
$arr[$username] = compact('name', 'username', 'password','status');
// $jsonenc = json_encode($arr);
$query = "SELECT data FROM ".$clgname." WHERE details='users'";
$result = mysqli_query($conn,$query);
$data = json_decode($result->fetch_assoc()['data'], true);
$data[$username] = $arr[$username];
$jsonenc = json_encode($data);
$q = "update srmist set data = '".$jsonenc."' where details='users'";
$result = mysqli_query($conn,$q);
if ($result) {
    echo "Success";
} else {
    echo "Error: " . $q . "<br>" . mysqli_error($conn);
}
?>