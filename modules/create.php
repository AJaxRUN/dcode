<!DOCTYPE html>
<html>
<head>
	<title>D Code</title>
	<!-- <link rel="stylesheet" href="../../css/login.css">  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>

label{
	float:left;
}
</style>
</head>
<body>
	<div class="container-fluid">
		<form type="post" >
			<div class="form-group col-lg-4 col-sm-offset-4" style="margin-top: 12%;text-align: center;">
				<div class="bg">
                <button type="button" id="create_btn" name="create" class="btn btn-primary btn-lg" style="width:200px;height:100px;margin-bottom:10px;" onclick="disp()">Create User</button>
				<br>
                <div class="form-group disp" style="margin-top:15px;" hidden>
				<label for="name" class="disp" >Name: </label>
				<input type="text hidden" id="name" name="name"  class="form-control disp" >
                <p id="empty_name" class="alert-danger" hidden>Enter your name</p><br>
				</div>
				<div class="form-group disp" style="margin-top:15px;" hidden>
				<label class="disp"  >Emp Code:</label>
				<input type="text" id="empcode" name="empcode" class="form-control disp" >
				<p id="empty_empcode" class="alert-danger" hidden>Enter your emp code</p><br>
				</div>
				<div class="form-group disp" style="margin-top:15px;" hidden>
				<label class="disp" >Password:</label>
				<input type="password" id="password" name="password" class="form-control disp" >
				<p id="empty_password" class="alert-danger" hidden>Enter your password</p><br>
				</div>
				<div class="disp" hidden>
					<button type="button" id="submit_btn" name="login" class="btn btn-success btn-lg disp" >Submit</button>
				</div>
				</div>
			</div>
		</form>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
	function disp(){
		$(".disp").show();
	}
  	function errordisplay(id, msg)
  	{
  		$("#"+id).html(msg).show();
  	}
  	$("#submit_btn").click(function() {
  		if(!$("#name").val())
  		{
  			errordisplay("empty_name","Enter your name");
  		}
  		else
  			$("#empty_name").hide();
        if(!$("#empcode").val())
  		{
  			errordisplay("empty_empcode","Enter your emp code");
  		}
  		else
  			$("#empty_password").hide();
  		if(!$("#password").val())
  		{
  			errordisplay("empty_password","Enter your password");
  		}
  		else
  			$("#empty_password").hide();
  		if(!$("#empty_password").is(":visible")&&!($("#empty_name").is(":visible"))&&!($("#empty_empcode").is(":visible")))
  		{
  			var name = $("#name").val();
  			var pwd = $("#password").val();
			var empcode =  $("#empcode").val();
  			$.ajax({
  				type:"POST",
  				url:"create_user.php?name="+name+"&password="+pwd+"&empcode="+empcode,
  				success:function(data)
  				{
  				  if(data==="failed")
  				  	errordisplay("empty_password","Invalid credentials");
  				  else if(data==="success") {
  				  	window.location.href = "create_user.php";
						alert("done");
  				  }
  				  else if(data==="Error")
  				  	errordisplay("empty_password","Unknown Error");
  				}
  			});
  		}
  	});
  </script>
</html>