<?php
    include_once 'config.php';
//form used to upload a file onto the database

    $target_dir = "objects/";
    $target_dir = $target_dir . basename($_FILES["uploadFile"]["name"]);
    $uploadOk = 1; //upload is ok to begin with

    //check if the file exists
    if($uploadFile_size > 1000){
        echo "Sorry your file is too large.";
        $uploadOk = 0;
    }
    if(!($uploadFile_type == "image/gif") || !($uploadFile_type == "image/png") || !($uploadFile_type == "image/png")
        || !($uploadFile_type == "image/bmp")){
        echo "Sorry only image files are allowed.";
        $uploadOk = 0;
    }
    //if uploadOk = 0, dont upload the file
    if($uploadOk == 0){
        echo "Your file was unable to be uploaded.";
    }
    else{
        if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)){
            echo "The file " . basename($_FILES["uploadFile"]["name"]) . "has been uploaded.";
        }
        else {
            echo "The file was unable to be uploaded.";
        }

    }

?>