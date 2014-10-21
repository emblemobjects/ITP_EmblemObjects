<?php

$target_dir = "uploads/";//directory to place the file
$target_dir = $target_dir . basename ( $_FILES["uploadFile"]["name"]);
$uploadOk = 1;

//insert file constraints (size, types, etc)
if($uploadFile_size > 500000)
{
    echo "File is too large "
    $uploadOk = 0;
}
if(!($uploadFile_type == "image/gif")){
    echo "Sorry, only ___ types of files are allowed";
    $uploadOk = 0;
}
if($ok ==0) {
    echo "Your file failed to upload ";
}
else {
    if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)) {//moves the file where it should be going
        echo "The file " . basename($_FILES["uploadFile"]["name"]) . has been uploaded ";"
} else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
