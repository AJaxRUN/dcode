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
    
</body>
<script type="text/javascript">

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
</script>
</html>
