<?php
	include "../connection/connection.php";
	$conn = Connection();
	$query = "SELECT data FROM developer WHERE details = 'colleges'";
	$result = mysqli_query($conn, $query);
	$data = json_decode($result->fetch_assoc()['data'], true);
	if(!empty($data))
		foreach ($data as $key => $value) {
			echo $key."%%";
		}
?>