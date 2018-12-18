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
    <script src= "../developer_module/developer.js"></script></script>
   <!-- <link rel="stylesheet" href="../../css/request.css"> -->
    <link rel="stylesheet" href="../../css/userlogin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/complaint.css">
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
    <div class="container contact-form">
            <div class="contact-image">
                  <img src="../../src/images/contract.png" style="width:100px;height:80px;" alt="complaint Form"/>
            </div>
            <form method="post" id="complaintform">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" id="submit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" id="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</body>
<script type="text/javascript">
    $("#navbar").load("../developer_module/developer.html");
    function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return pattern.test(emailAddress);
    }

    $(document).ready(function() {
        //For getting session data
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
        // For populating user data 
        // $.ajax({
        //     type:"GET",
        //     url: "../get_user_data/populateAjax.php",
        //     success: function(data) {
        //         $("#clgname").text(data['clgname']);
        //         $("#empcode").append(data['empcode']);
        //         $("#profile").text(data['name']);
        //         console.log(data);
        //     },
        //     dataType:"json"
        // });
    });
    $("#submit").click(function(event) {
        event.preventDefault();
        var isValid = true;
        $("#complaintform input").each(function(){
            $(this).addClass("is-invalid");
            isValid = false;
        });
        // if(($.trim($("#email").val()).length>0)&&!isValidEmailAddress($("#email").val()))
        // {

        // }
    });
</script>
</html>
