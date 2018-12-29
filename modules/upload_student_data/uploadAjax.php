<?php 
	//To check if the user is logged in
	session_start();
    if(!isset($_SESSION['login'])||($_SESSION['login']==false))
    {
      header('Location:../logout/logout.php?login=failed');
      exit();
    }

    //To create a directory with clg name
    $clgname = $_SESSION["clgname"];
	if (!file_exists("../../uploads/".$clgname)) {
		mkdir("../../uploads/".$clgname, 0777, true);
	}

	//To check if there was any error in uploading the file
	if ($_FILES["uploadedfile"]["error"] > 0)
    {
    	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    	header('Location:../logout/logout.php?login=failed');
    	exit();
    }

    //To check if the data was uploaded through the upload module
    if(strcmp($_POST["validate"],"true")!=0)
    {
    	header('Location:../logout/logout.php?login=failed');
    	exit();
    }

    //To move the uploaded file to right directory:
	$target_path = "../../uploads/".$clgname."/";
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
	    " has been uploaded";
	} else{
	    echo "There was an error uploading the file, please try again!";
	}


	 //    echo "Upload: " . $_FILES["uploadedfile"]["name"] . "<br />";
		// echo "Type: " . $_FILES["uploadedfile"]["type"] . "<br />";
		// echo "Size: " . ($_FILES["uploadedfile"]["size"] / 1024) . " Kb<br />";
		// echo "Temp file: " . $_FILES["uploadedfile"]["tmp_name"] . "<br />";
?>
