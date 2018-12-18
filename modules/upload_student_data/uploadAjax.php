<?php 
// move_uploaded_file(
//   $_FILES["file"]["tmp_name"],
//   $_SERVER['DOCUMENT_ROOT'] . 'upload/' . $_FILES["file"]["name"]
// );

	if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
	echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	echo "Type: " . $_FILES["file"]["type"] . "<br />";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

                
?>
