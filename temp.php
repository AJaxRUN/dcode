<?php
  
  /*$flag = 0;
  $lag = 0;
  $existingdate = array();
  $i = 0;
  $pi[0] = $_POST['fromDate'];
  $pi[1] = $_POST['toDate'];
  $datestr = "";
  $sd = split("/", $pi[0]);
  $ed  = split("/", $pi[1]);
  $qu = "SELECT * FROM log";
  $result = mysqli_query($link , $qu);
  while($row = $result->fetch_assoc()) {
    $fd = split("/", $row['date']);
    $flag = 0;$lag = 0;
    if($fd[2]>= $sd[2] && $fd[2]<= $ed[2])
    { 
      if($fd[1]>$sd[1])
        {$flag = 1;}
      else if($fd[1]==$sd[1])
        {if($fd[0]>=$sd[0])
          {$flag = 1;}}
      else
        {$flag= 0;}
      if($fd[1]<$ed[1])
        {$lag = 1;}
      else if($fd[1]==$ed[1])
        {if($fd[0]<=$ed[0])
          {$lag = 1;}}
      else
        {$lag= 0;}
    }
    if($lag==1 && $flag==1)
      $datestr .= $row['regno'].",";
  }
   $datearray = array_unique(explode(",", $datestr));
  for($iter=0;$iter<4;$iter++) {
    switch ($iter) {
      case 0: $year = "I_year";break;
      case 1: $year = "II_year";break;
      case 2: $year = "III_year";break;
      case 3: $year = "IV_year";break;
      default: $year = "III_year";break;
    }
     $result = mysqli_query($link , $qu);
      while($row = $result->fetch_assoc()) {
          $te = $row['regno'];
          if(in_array($te, $datearray)&&!in_array($te,$existingdate)) {
            $pu = "SELECT * FROM $year WHERE regno = '$te'";
            $re = mysqli_query($link , $pu);
            if(mysqli_num_rows($re))
            {
              $ro = mysqli_fetch_array($re);
              $existingdate[$i++] = $te;
              $x = $ro['regno'];
              $lu = "SELECT * FROM log WHERE regno LIKE '$x'";
              $y = mysqli_query($link, $lu);  
              if (mysqli_num_rows($y)) {
              $y = mysqli_query($link , $lu);
              $pow = "";
              while($pow = $y->fetch_assoc())
                  if(strcmp($pow['late'],"1")==0||strcmp($pow['dress'],"1")==0)
                    $count++;
              $y = mysqli_query($link , $lu);
              $pow = "";
              while($pow = $y->fetch_assoc())
                if(strcmp($pow['achieve'],"1")==0)
                  $count1++;
              echo $ro['regno'].";". $ro['name'].";". $ro['batch'].";". $ro['dept'].";". $ro['section'].";".$count.";".$count1.":";
              $count=0;$count1=0;
            }  
        }
        }
    }
    }*/

?> 

<!DOCTYPE html>
<html>
<head>
	<title>D CODE</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src= "../developer_module/developer.js"></script>
	<link rel="stylesheet" href="../../css/login.css">
  <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
	<!-- <ul>
    <li style="float:left;margin-left:20px;"><a id="dcode" class="active" style="text-decoration:none;" href="../info/info.php">D CODE</a></li>
  <li style="float:right;margin-right:10px" id="flip"><a class="active" style="text-decoration:none;">Developers</a></li>
</ul> -->
</head>
<body>
	<div id="navbar" style="z-index:1000;position:relative;width:auto;height:auto;"></div>
		<form action="generatepdf.php" method="post">
			<div class="form-group col-lg-3 col-sm-offset-4" style="padding-top: 4%;text-align:center;">
				<div class="inputBg">
					<h3>D Code</h3><hr>
          <div class="alert-danger" id="invalid"></div><br>
          <label for="fromDate" style="float:left;margin-bottom:10px;">From Date <span class="required-input">*</span> </label>
					<input type="date" id="fromDate" name="fromDate" class="form-control">
					<p id="empty_username" class="alert-danger" hidden></p><br>
          <label for="toDate" style="float:left;margin-bottom:10px;">To Date <span class="required-input">*</span> </label>
					<input type="date" id="toDate" name="toDate" class="form-control">
					<p id="empty_password" class="alert-danger" hidden>Enter your password</p><br>
            
            <p><button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary btn-lg" style="width:150px;">Submit</button></p>
          </div>
				</div>
			</div>
		</form>
	</div>
</body>
<script type="text/javascript">
//   $('input[id$=fromDate]').datepicker({
//     dateFormat: 'dd-mm-yy'
// });

// $('input[id$=toDate]').datepicker({
//     dateFormat: 'dd-mm-yy'
// });
</script>
  <!-- <script type="text/javascript">
  $("#navbar").load("../developer_module/developer.html");
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
  </script> -->
</html>