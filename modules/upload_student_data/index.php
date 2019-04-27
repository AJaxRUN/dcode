<?php 
    ini_set('file_uploads', 'On');
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
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/upload_student_data.css">
    <link rel="stylesheet" href="../../css/upload_instructions.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <ul class="layer" id="topnav">
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
    <div id="layer" style="z-index: 2;">
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div id="how_to_upload"></div>
    </div>
        <div id="navbar" style="z-index:1000;position:relative;width:auto;height:auto;"></div>
        <div class="InputBg">
            <h4>Data Last uploaded on : 14/07/18 at 17:30</h4><hr>
            <h4>Ensure the file follows the format mentioned strictly before uploading, remove undesired white spaces and empty fields. For instructions on how to upload</h4>
            <div style="padding-left:100px;">
            <button onClick="openNav()" id="link" class="btn btn-warning">Format for uploading data</button>
            </div><hr>
            <h4 class="status">&nbsp Warning!! Uploading student data will erase the data of &nbsp&nbspthe students of the same year, if it exists already.</h4><hr>
            <div style="padding-left:80px;">
                <form enctype="multipart/form-data" action="uploadAjax.php" method="POST">
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                    <input name="uploadedfile" type="file" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
                    <input type="hidden" name="validate" value="true">
                    <h5 style="padding-left:0px;">*Please read format for uploading student data before uploading!!</h5> 
                    <h4 style="padding-left:80px;"><input type="submit" value="Upload File" class="btn btn-success" /></h4>
                </form>
            </div>
        </div>
    </div>
    <div id="bg" class="bgblack" hidden></div>
</body>
<script type="text/javascript">
    //Navbar
    $("#bg").hide();
    $("#navbar").load("../developer_module/developer.html");

    $(document).ready(function() {
        document.body.style.backgroundColor = "rgba(0,0,0,1)";
        //For getting session data
        $.ajax({
            type:"GET",
            url: "../sessiondata/populateAjax.php",
            success: function(data) {
                $("#profile").text(data['name']);
            },
            dataType:"json"
        });
    });

    function openNav() {
        $("#bg").show();
        document.getElementById("mySidenav").style.width = "45%";
        $("#bg").animate({'margin-left': '45%'}, 'slow');
    }
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      $("#bg").animate({'margin-left': '0%'}, 'slow');
      $("#bg").hide();
    }

   //To load instructions
   $("#how_to_upload").load("upload_instructions.html");
</script>
</html>
