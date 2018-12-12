<?php
  session_start();
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
      $("#flip").click(function(){
          $("#panel").slideToggle("slow");
        });
    });
	</script>
	<link rel="stylesheet" href="../../css/login.css">
	<ul>
    <li style="float:left;margin-left:20px;"><a id="dcode" class="active" style="text-decoration:none;" href="../info/info.php">D CODE</a></li>
  <li style="float:right;margin-right:10px" id="flip"><a class="active" style="text-decoration:none;">Developers</a></li>
</ul>
</head>
<body>
	<div class="container-fluid">
	<div id="panel" hidden style="z-index:100;">
		<div class="card">
		<!-- <div class="container"> -->
		<img src="../../src/images/aksh.jpg" style="float:left;width:100px;height:90px;margin-bottom:5px;">
			<h4><b>R Akshaya</b></h4>
			<h5>CSE-A</h5>
			<h5>2016-20</h5>
		<!-- </div> -->
</div>
<div class="card">
    <!-- <div class="container"> -->
    <img src="../../src/images/aj1.jpg" style="float:left;width:100px;height:90px;margin-bottom:5px;">
      <h4><b>C R Arjun</b></h4>
      <h5>CSE-A</h5>
      <h5>2016-20</h5>
    <!-- </div> -->
</div>
<div class="card">
		<!-- <div class="container"> -->
      <img src="../../src/images/maam.jpg" style="float:left;width:100px;height:90px;margin-bottom:5px;">
			<h4><b>Mrs.M Indumathy</b></h4>
			<h5>Staff Co-Ordinator</h5>
      <h5><br></h5>
		<!-- </div> -->
</div>
</div>
		<form type="post">
			<div class="form-group col-lg-3 col-sm-offset-4" style="padding-top: 4%;text-align:center;">
				<div class="inputBg">
					<h3>D Code</h3><hr>
          <div class="alert-danger" id="invalid"></div><br>
          <label for="username" style="float:left;margin-bottom:10px;">Username <span class="required-input">*</span> </label>
					<input type="text" id="username" name="username" placeholder="Employee Code" class="form-control">
					<p id="empty_username" class="alert-danger" hidden></p><br>
          <label for="password" style="float:left;margin-bottom:10px;">Password <span class="required-input">*</span> </label>
					<input type="password" id="password" name="password" placeholder="Password" class="form-control">
					<p id="empty_password" class="alert-danger" hidden>Enter your password</p><br>
            <select name="clgname" id="clgname" class="form-control" style="margin-top:10px;">
              <option value="College name" selected hidden>College name</option>
            </select>
            <p id="empty_clg" class="alert-danger" hidden>Enter your password</p><br>
        	<input type="checkbox" name="dev" id="dev" class="form-check-input" style="margin-top:0px;margin-bottom:20px;"> Developer
          <div>
            <p><button type="button" id="submit_btn" name="login" class="btn btn-primary btn-lg" style="width:150px;">Login</button></p>
            <p><button type="button" id="register_btn" name="register" class="btn btn-primary btn-lg" style="width:150px;">Register</button></p>
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
  			errordisplay("empty_username","Enter your Employee code");
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
        var isValid=true;
  			var uname = $("#username").val();
  			var pwd = $("#password").val();
        var urldata = "username="+uname+"&password="+pwd;
        if(!$("#dev").is(":checked")) {
          if($("#clgname").val()!="College name") {
            urldata+="&clgname="+$("#clgname").val();
            $("#empty_clg").hide();
          }
          else {
            isValid = false;
            errordisplay("empty_clg","Please select college name!!");
          }
        }
        else
          $("#empty_clg").hide();
        if(isValid) {
    			$.ajax({
    				type:"POST",
    				url:"validate.php?"+urldata,
    				success:function(data)
    				{
    				  if(data==="failed")
    				  	errordisplay("empty_password","Invalid credentials");
    				  else if(data==="success") {
    				  	window.location.href = "../../index.php";
    				  }
    				  else if(data==="Error")
    				  	errordisplay("empty_clg","Server error!!");
    				}
    			});
        }
      }
  	});
  </script>
</html>