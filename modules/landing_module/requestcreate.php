<?php
require "../connection/connection.php";
session_start();
$conn = Connection();
$clgname= $_REQUEST['name'];
$q1 = "SELECT data FROM developer WHERE details='requests'";
$result1 = mysqli_query($conn,$q1);
$data = json_decode($result1->fetch_assoc()['data'], true);
$name = $data[$clgname]['name'];
$username = $data[$clgname]['username'];
$password = $data[$clgname]['password']; 
$status = "Data not uploaded";
$q2 = "CREATE TABLE ".$clgname." (id int NOT NULL AUTO_INCREMENT,data mediumtext,details text, PRIMARY KEY (ID))";
$result2 = mysqli_query($conn,$q2);
$q3 = "INSERT INTO ".$clgname." (details) VALUES ('students')";
$result3 = mysqli_query($conn,$q3);
$arr = array();
$arr[$username] = compact('name', 'username', 'password','status');
$jsonenc = json_encode($arr);
$q4 = "INSERT INTO ".$clgname." (data,details) VALUES ('".$jsonenc."','users')";
$result4 = mysqli_query($conn,$q4);
if($result2&&$result3&&$result4)
{
    echo "Successful";
    header("location:request.php");
}
else{
        echo "Error: " . $q2 . "<br>" . mysqli_error($conn);
}
?>