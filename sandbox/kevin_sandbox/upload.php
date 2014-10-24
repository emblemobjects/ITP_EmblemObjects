<?php

$target_dir = "uploads/";//directory to place the file
$target_dir = $target_dir . basename ( $_FILES["uploadFile"]["name"]);
$uploadOk = 1;

//insert file constraints (size, types, etc)
if($uploadFile_size > 1000) //what is the file size?
{
    echo "File is too large ";
    $uploadOk = 0;
}
if(!($uploadFile_type == "image/bmp" || $uploadFile_type == "image/jpg" || $uploadFile_type == "image/png"
|| $uploadFile_type == ".ai")){
    echo "Sorry, only image file types are allowed";
    $uploadOk = 0;
}
//use the array
//explode file name and extract everything with period
//$_FILES["file"]["type"] == "image/png");
//$temp = explode(".",$_FILES["file"]["name"]);
// $extension = end($temp);
if($ok ==0) {
    echo "Your file failed to upload ";
}
else {
    if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)) {//moves the file where it should be going
        echo "The file " . basename($_FILES["uploadFile"]["name"]) . "has been uploaded ";
} else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
