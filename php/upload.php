<?php

/*  uploadFile : Validates, renames, and moves a file to the server or returns an error if this cannot be done
*   Input:
*       $file : The file being uploaded
*       $target_dir : The directory where the file should go in the server
*       $enable_id : The id of the enable order, such as "154"
*       $new_file_name : The name of the file, such as "customer_artwork"    
*       (The file will be stored as ../uploads/154_customer_artwork.png)
*   Output:
*       An array containing 2 values:
*       1) $uploadOk: the upload status of the file. 1 = ok, 0 = error
*       2) $message: Either an error message if the upload was not successful or the images new file path after uploading
*/
function uploadFile($file_type_num, $file, $target_dir, $enable_id, $new_file_name) {
      
    $target_file = $target_dir . basename($file["name"]);   
    $uploadFile_type = $file["type"];
    $uploadFile_size = $file["size"];

    $uploadOk = 1;  // Upload status
    
    
    // Check if file size > 3MB
    if ($uploadFile_size > 3000000) {
        $upload_message = "*File size can not exceed 3MB.";
        $uploadOk = 0;
    }
    
    
    // File types
    if ($file_type_num == 1){ // customer
        $filetypes = array("image/gif", "image/png", "image/jpg", "image/jpeg", "application/postscript");
        if (in_array($uploadFile_type, $filetypes)) {
            $uploadFile_type = strstr($uploadFile_type, '/');
            $uploadFile_type = str_replace("/", ".", $uploadFile_type);
        } else {
            $upload_message = "*Only .gif, .png, .jpg, .jpeg, and .ai files are allowed.";
            $uploadOk = 0;
        } 
    } elseif ($file_type_num == 2){
        $filetypes = array("application/octet-stream", "application/vnd.ms-pki.stl");
        if ($uploadFile_type == $filetypes[0]){
            $uploadFile_type = ".obj";
        } elseif ($uploadFile_type == $filetypes[1]){
            $uploadFile_type = ".stl";
        } else {
            $upload_message = "*Only .obj and .stl files are allowed.";
            $uploadOk = 0;
        }
    } elseif ($file_type_num == 3){
        $filetypes = array("text/vnd.in3d.3dml", "model/vnd.flatland.3dml");
        if (in_array($uploadFile_type, $filetypes)) {
            $uploadFile_type = ".3dm"; 
        } else {
            $upload_message = "*Only .3dm files are allowed.";
            $uploadOk = 0;
        }
    }
    
    
    
    // If uploadOk, rename and move file
    if ($uploadOk == 1) {
        $file_name = $enable_id . "_" . $new_file_name;
        $file_path = $target_dir . $file_name . $uploadFile_type;
        
        // Move the uploads to the orders directory and rename them
        if (move_uploaded_file($file["tmp_name"], $file_path)) {
            $upload_message = "/uploads/". $file_name . $uploadFile_type;
        } else {
            $upload_message = "There is a problem with your file. Please choose another";
            $uploadOk = 0;
        } 
    }
    
    return array($uploadOk, $upload_message);
}


?> 