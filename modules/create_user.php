<?php
session_start();
include("connection/connection.php");
$conn = Connection();
$name = $_REQUEST['name'];
$username = $_REQUEST['empcode'];
$password = md5($_REQUEST['password']);
$arr = array();
$arr[$username] = compact('name', 'username', 'password');
$jsonenc = json_encode($arr);
echo($jsonenc);
$query = "update srmist set data = concat(ifnull(data,''),'".$jsonenc."') where details='user'";
$result = mysqli_query($conn,$query);
if ($result) {
    echo "Success";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>