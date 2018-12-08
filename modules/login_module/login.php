<?php
  if(isset($_SERVER['QUERY_STRING'])&&!empty($_SERVER['QUERY_STRING']))
    echo "<script type='text/javascript'>var msg='Please log in to continue';</script>";
  else
    echo "<script type='text/javascript'>var msg=''</script>";
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!DOCTYPE html>
<html>
<head>
	<title>D CODE</title>
	<link rel="stylesheet" href="../../css/login.css">
</head>
<body>
	<div class="container-fluid">
		<form type="post">
			<div class="form-group col-lg-3 col-sm-offset-4" style="padding-top: 12%;text-align: center;">
				<div class="inputBg">
					<h3>D Code</h3><hr>
          <div class="invalid-feedback" id="invalid"></div><br>
          <label for="username">Username <span class="required-input">*</span> </label>
          <div class="col-xs-4">
					 <input type="text" id="username" name="username" placeholder="Username" class="form-control input-lg">
          </div>
					<p id="empty_username" class="alert-danger" hidden></p><br>
          <label for="password">Password <span class="required-input">*</span> </label>
					<input type="password" id="password" name="password" placeholder="password" class="form-control">
					<p id="empty_password" class="alert-danger" hidden>Enter your password</p><br>
          <p>
            <select name="clgname">
              <option value="College name" selected hidden>College name</option>
              <option value="SRM">SRM</option>
            </select>
          </p>
					<button type="button" id="submit_btn" name="login" style="clear:both;display:block;margin-left:140px" class="btn btn-primary btn-lg">login</button>
          <button type="button" id="register_btn" style="margin-top: 9px;clear:both;display:block;margin-left:129px" name="register" class="btn btn-default btn-lg">register</button>
				</div>
			</div>
		</form>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
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