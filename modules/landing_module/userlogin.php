<?php 
	session_start();
	if(!isset($_SESSION['login'])||($_SESSION['login']==false))
	{
	  header('Location:../logout/logout.php?login=failed');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>D Code</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src= "../developer_module/developer.js"></script>
	<link rel="stylesheet" href="../../css/request.css">
	<link rel="stylesheet" href="../../css/userlogin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <ul>
  		<li style="float:right;margin-right:10px;"><a class="active" style="text-decoration:none;" href="../logout/logout.php">Logout</a></li>
  		<li style="float:right;margin-right:10px;"><a class="active" style="text-decoration:none;" href="../complaint/complaint.php">Report Issue</a></li>
  		<li style="float:right;margin-right:10px;"><a class="active" style="text-decoration:none;" href="../upload_student_data/">Upload Data</a></li>
  		<li style="float:left;margin-left:20px;"><a id="dcode" class="active" style="text-decoration:none;" href="../info/info.php">D CODE</a></li>
  		<li style="float:right;margin-right:10px;"><a id="profile" class="active" style="text-decoration:none;" href="../profile/profile.php"></a></li>
  		<li style="float:right;margin-right:10px" id="flip"><a class="active" style="text-decoration:none;">Developers</a></li>
	</ul>
</head>
<body>
	<div id="navbar" style="z-index:1000;position:relative;width:auto;height:auto;"></div>
	<div class="box">
		<b><h1 id="clgname"></h1></b><br>
		<h4 id="status" class="status">STATUS: </h4><hr>
		<h4 id="empcode">Emplyoee Code: </h4><hr>
		<!-- <h4><input type="button" name="upload" class="btn btn-primary" value="Upload Student Records"></h4> -->
		<h4>Student record last uploaded on: 14/07/18</h4>
	</div>
	<div class="data">
		<h2>Random Data</h2>
		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
	</div>
</body>
<script type="text/javascript">
	$("#navbar").load("../developer_module/developer.html");
	$(document).ready(function() {
		$.ajax({
			type:"GET",
			url: "../sessiondata/populateAjax.php",
			success: function(data) {
				$("#status").append(data['status']);
				$("#clgname").text(data['clgname']);
				$("#empcode").append(data['empcode']);
				$("#profile").text(data['name']);
			},
			dataType:"json"
		});
	});
</script>
</html>