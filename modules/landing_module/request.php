<?php
session_start();
if(!isset($_SESSION['login'])||($_SESSION['login']==false))
{
  header('Location:../logout/logout.php?login=failed');
}
require "../connection/connection.php" ;
$conn = Connection();
?>
<!DOCTYPE html>
<html>
<head>
	<title>D Code</title>
	<link rel="stylesheet" href="../../css/request.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <ul>
  <li style="float:right;margin-right:10px;"><a class="active" href="../logout/logout.php">Logout</a></li>
</ul>
</head>
<body>
	<div class="container-fluid">
    <div class="row">
    <div class="col-sm-6 column" style="text-align:center;margin-top:10%;">
        <p style="float:left;color:white;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices maximus tortor, vitae pharetra velit finibus a. Pellentesque id lobortis quam, nec mollis mauris. Nullam convallis leo mi, id commodo felis molestie et. Nunc fermentum est dolor, ut pulvinar ipsum ultrices in. Proin iaculis quam sed leo iaculis dictum. Nunc eu mauris a quam finibus dictum ac id tellus. Vestibulum vitae ex pulvinar, posuere augue at, congue leo. Sed ultrices blandit malesuada. Fusce pharetra mi in metus hendrerit, nec auctor velit blandit. Nulla ac posuere lorem.</p>
    </div>
		<div class="col-sm-6 bg column" style="width:500px;height:auto;float:right;margin-right:50px;">
        <h4 style="color:white;text-align:center;">REQUESTS</h4>
        <?php
            $query = "SELECT data FROM developer WHERE details='requests'";
            $result = mysqli_query($conn,$query);
            $data = json_decode($result->fetch_assoc()['data'], true);
            foreach($data as $key=>$value)
            {
				$q = "SELECT 1 FROM ".$key." LIMIT 1";
				$re = mysqli_query($conn,$q);
                echo "<div class='card'>";
                echo "<div class='container'>";
                echo "<h4><b>".$key."</b></h4>";
				echo "<p>".$data[$key]['username']."</p>";
				if($re){
				echo "<button class='btn btn-sm btn-success disabled done' type='button'>Accepted</button>";}
				else{
				echo "<button class='btn btn-sm btn-success accept' id=$key onclick='redirect(this.id)' type='button'>Accept</button>";}
				echo " </div>";
                echo "</div>";
            }
        ?>
             
        </div>
        </div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
  function redirect(id)
  {
	  window.location.href="requestcreate.php?name="+id; 
	  alert("Table Created Successfully!");
  }
  </script>
</html>