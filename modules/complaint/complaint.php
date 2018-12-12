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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#flip").click(function(){
          $("#panel").slideToggle("slow");
        });
    });
</script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="../../css/complaint.css">
    <link rel="stylesheet" href="../../css/request.css">
    <link rel="stylesheet" href="../../css/userlogin.css">
    <ul>
        <li style="float:right;margin-right:10px;"><a class="active" style="text-decoration:none;" href="../logout/logout.php">Logout</a></li>
        <li style="float:right;margin-right:10px;"><a class="active" style="text-decoration:none;" href="../complaint/complaint.php">Report Issue</a></li>
        <li style="float:right;margin-right:10px;"><a class="active" style="text-decoration:none;" href="../upload/upload.php">Upload Data</a></li>
        <li style="float:left;margin-left:20px;"><a id="dcode" class="active" style="text-decoration:none;" href="../info/info.php">D CODE</a></li>
        <li style="float:right;margin-right:10px;"><a id="profile" class="active" style="text-decoration:none;" href="../profile/profile.php"></a></li>
        <li style="float:right;margin-right:10px" id="flip"><a class="active" style="text-decoration:none;">Developers</a></li>
    </ul>
</head>
<body>
    <div id="panel" hidden style="position:relative;z-index: 9999;">
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
                    <h4><b>Mrs.M Indumathy</b></h4>
                    <h5>Staff Co-Ordinator</h5>
                <!-- </div> -->
        </div>
    </div>
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

    function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return pattern.test(emailAddress);
    }

    $(document).ready(function() {
        $.ajax({
            type:"GET",
            url: "../landing_module/populateAjax.php",
            success: function(data) {
                $("#status").append(data['status']);
                $("#clgname").text(data['clgname']);
                $("#empcode").append(data['empcode']);
                $("#profile").text(data['name']);
            },
            dataType:"json"
        });
        $.ajax({
            type:"GET",
            url: "../get_user_data/populateAjax.php",
            success: function(data) {
                // $("#status").append(data['status']);
                // $("#clgname").text(data['clgname']);
                // $("#empcode").append(data['empcode']);
                // $("#profile").text(data['name']);
                console.log(data);
            },
            dataType:"json"
        });
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
