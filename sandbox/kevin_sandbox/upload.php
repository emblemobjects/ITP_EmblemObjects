<?php

$target_dir = "uploads/";//directory to place the file
$target_dir = $target_dir . basename ( $_FILES["uploadFile"]["name"]);
$uploadOk = 1;

if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"],$target_dir))
{//moves the file where it should be going
    echo "The file " . basename($_FILES["uploadFile"]["name"]). has been uploaded ";"
}
else{
    echo "Sorry, there was an error uploading your file.";
}

?>
