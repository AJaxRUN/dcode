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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src= "../developer_module/developer.js"></script></script>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <ul>
        <li style="float:right;margin-right:10px;"><a class="active" style="text-decoration:none;" href="../logout/logout.php">Logout</a></li>
        <li style="float:right;margin-right:10px;"><a class="active" style="text-decoration:none;" href="../complaint/complaint.php">Report Issue</a></li>
        <li style="float:right;margin-right:10px;"><a class="active" style="text-decoration:none;" href="../upload_student_data/">Upload Data</a></li>
        <li style="float:left;margin-left:20px;"><a id="dcode" class="active" style="text-decoration:none;" href="../info/info.php">D CODE</a></li>
        <li style="float:right;margin-right:10px;"><a id="profile" class="active" style="text-decoration:none;" href="../profile/profile.php"></a></li>
        <li style="float:right;margin-right:10px" id="flip"><a class="active" style="text-decoration:none;">Developers</a></li>
        <li style="float:right;margin-right:10px;"><a class="active" style="text-decoration:none;" href="../landing_module/userlogin.php">Home page</a></li>
    </ul>
</head>
<body>
    <div id="navbar" style="z-index:1000;position:relative;width:auto;height:auto;"></div> 
    <div class="data">
        <h1 id="clg"></h1>
        <h3 id="empcode"></h3>
        <hr>
        <form method="post" id="profile_details" action="changeDetails.php">
            <div class="form-group">
                <small>Name:</small>
                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" value="" />
            </div>
            <div class="form-group">
                <small>Email:</small>
                <input type="text" id="email" name="email" class="form-control" placeholder="Your Email"/>
            </div>
            <div class="form-group">
                <small>Contact no:</small>
                <input type="text" id="contact" name="contact" class="form-control" placeholder="Your Phone Number" value="" />
            </div>
            <div class="form-group">
                <small>Password/New Password:</small>
                <input type="password" id="password" name="password" class="form-control" placeholder="Your new password" value="" />
            </div>
            <div class="form-group">
                <small>Confirm your password:</small>
                <input type="password" id="cnfpassword" class="form-control" placeholder="Confirm your new password" value="" />
            </div>
            <div id="error" class="alert-danger" style="display:inline-block;margin-left:17%;padding:1.02%;"></div><br>
            <br>
            <div class="form-group">
                <input style="margin-left:35%;" type="submit" name="btnSubmit" id="submit" class="btn btn-primary" value="Update" />
            </div>
        </form>
    </div>
</body>
<script type="text/javascript">
    //Setup
    $("#error").hide();
    var errormsg="";

    //For loading navbar    
    $("#navbar").load("../developer_module/developer.html");
      $(document).ready(function() {
        $.ajax({
            type:"GET",
            url: "../sessiondata/populateAjax.php",
            success: function(data) {
                $("#name").val(data['name']);
                $("#clg").text(data['clgname']);
                $("#empcode").text(data['alldata']['username']);
                $("#email").val(data['alldata']['email']);
                $("#contact").val(data['alldata']['contactnumber']);
                $("#profile").text(data['name']);
            },
            dataType:"json"
        });
    });

    //Email validation function for regex 
    function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return pattern.test(emailAddress);
    }

    //To do validation
    $("#submit").click(function(event) {
        event.preventDefault();
        var isValid=true;
        if(!($.trim($("#email").val()).length>0)&&!isValidEmailAddress($("#email").val()))
        {
            $("#error").text(" Please enter a valid email ID").show();
            isValid=false;
        }
        else {
            $("#error").hide();
            isValid=true;
        }
        $("#error").text("").hide();
        if(!($("#password").val()==$("#cnfpassword").val())) {
            isValid=false;
            errormsg=" Passwords don't match!";
            $("#error").text(errormsg).show();
        }
        else {
            $("form input").each(function() {
                var element = $(this);
                if (element.val() == "") {
                   isValid=false;
                   element.addClass("is-invalid");
                    $("#error").text("Please fill all the input fields(valid inputs)!!").show();
                }
                else
                    element.removeClass("is-invalid");
            });
        }
        if(isValid)
            $("#error").text("").hide();
        if(isValid) {
            data=$("form").serialize();
            $.ajax({
                type:"POST",   
                async: false,
                cache: false,
                url:"profileUpdateAjax.php?"+data,
                success:function(res)
                { 
                    if(res.trim()=="success"){
                        alert("Updated Succesfully!!");
                        window.location.href="../../";
                    }
                    else
                        alert("Some error occured");
                }

            });
        }
    });
</script>
</html>
