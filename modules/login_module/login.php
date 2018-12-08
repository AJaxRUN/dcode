<?php
  if(isset($_SERVER['QUERY_STRING'])&&!empty($_SERVER['QUERY_STRING']))
    echo "<script type='text/javascript'>var msg='Please log in to continue!!';</script>";
  else
    echo "<script type='text/javascript'>var msg=''</script>";
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!DOCTYPE html>
<html>
<head>
	<title>D CODE</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>
  	$(document).ready(function(){
      $("#flip").hover(function(){
          $("#panel").slideToggle("slow");
        });
    });
	</script>
	<link rel="stylesheet" href="../../css/login.css">
	<ul>
  <li style="float:right;margin-right:10px" id="flip"><a class="active" style="text-decoration:none;">Developers</a></li>
</ul>
</head>
<body>
	<div class="container-fluid">
	<div id="panel" hidden>
		<div class="card">
		<!-- <div class="container"> -->
			<h4><b>Arjun C R</b></h4>
			<h5>CSE-A</h5>
			<h5>2016-20</h5>
		<!-- </div> -->
</div>
		<div class="card">
		<!-- <div class="container"> -->
			<h4><b>R Akshaya</b></h4>
			<h5>CSE-A</h5>
			<h5>2016-20</h5>
		<!-- </div> -->
</div>
</div>
		<form type="post">
			<div class="form-group col-lg-3 col-sm-offset-4" style="padding-top: 4%;text-align:center;">
				<div class="inputBg">
					<h3>D Code</h3><hr>
          <div class="alert-danger" id="invalid"></div><br>
          <label for="username">Username <span class="required-input">*</span> </label>
					<input type="text" id="username" name="username" placeholder="Username" class="form-control">
					<p id="empty_username" class="alert-danger" hidden></p><br>
          <label for="password">Password <span class="required-input">*</span> </label>
					<input type="password" id="password" name="password" placeholder="password" class="form-control">
					<p id="empty_password" class="alert-danger" hidden>Enter your password</p><br>
          <p>
            <select name="clgname" id="clgname" class="form-control">
              <option value="College name" selected hidden>College name</option>
            </select>
          </p>
          <div>
            <p><button type="button" id="submit_btn" name="login" class="btn btn-success btn-lg">login</button></p>
            <p><button type="button" id="register_btn" name="register" class="btn btn-primary btn-lg">register</button></p>
          </div>
				</div>
			</div>
		</form>
	</div>
</body>
  <script type="text/javascript">

    //To populate college names 
    $(document).ready(function () {
      $.ajax({
        type: 'GET',
        url: 'populate.php',
        async: false,
        cache: false,
        success: function(data) {
          res = data.split("%%");
          res.pop();
          $.each(res, function(item) {
            $("#clgname").append('<option value="'+res[item]+'">'+res[item]+'</option>');
          });
        }
      });
    });
    if(msg!="")
      $("#invalid").text(msg);
    //Redirect to register page
    $("#register_btn").click(function() {
      window.location.href = "../../index.php?action=register";
    });

    //Display errormsg
  	function errordisplay(id, msg)
  	{
  		$("#"+id).html(msg).show();
  	}

    //Login validation
  	$("#submit_btn").click(function() {
  		if(!$("#username").val())
  		{
  			errordisplay("empty_username","Enter your username");
  		}
  		else
  			$("#empty_username").hide();
  		if(!$("#password").val())
  		{
  			errordisplay("empty_password","Enter your password");
  		}
  		else
  			$("#empty_password").hide();
  		if(!$("#empty_password").is(":visible")&&!($("#empty_username").is(":visible")))
  		{
  			var uname = $("#username").val();
  			var pwd = $("#password").val();
  			$.ajax({
  				type:"POST",
  				url:"validate.php?username="+uname+"&password="+pwd,
  				success:function(data)
  				{
  				  if(data==="failed")
  				  	errordisplay("empty_password","Invalid credentials");
  				  else if(data==="success") {
  				  	window.location.href = "../../index.php";
  				  }
  				  else if(data==="Error")
  				  	errordisplay("empty_password","Unknown Error");
  				}
  			});
  		}
  	});
  </script>
</html>