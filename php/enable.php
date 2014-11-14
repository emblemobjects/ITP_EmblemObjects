<?php
/**
 * Enable Request Object  :
 * Enable # ___
 * Requested by ___
 * Item name :
 * Size:
 * Material
 * Artwork
 * Object file
 *
 * Functions for enable.php :
 * get_request_info - gets the request information using a enable_id
 * update function - request approve
 * update function - request denied
 * submit enable request
 * submit enable // when designer uploads related files
 */
include_once 'config.php';

class enable
{

    public static function get_request_info($enable_id)
    {
        global $con;
        $array_info = [];
        $sql = "SELECT * FROM enable WHERE enable_id = '$enable_id'";
        $result = mysqli_query($con, $sql);
        if (!$result){
            exit (mysqli_error($con));
        }
        $r = mysqli_fetch_array($result);
        $user_id = $r['user_id'];
        $item_id = $r['item_id'];
        $material_id = $r['material_id'];
        $sql_user = "SELECT user_first_name, user_last_name FROM user_table WHERE user_id = '$user_id'";
        $result_user = mysqli_query($con, $sql_user);
        if (!$result_user){
            exit (mysqli_error($con));
        }
        $r2 = mysqli_fetch_array($result_user);
        $sql_item = "SELECT item_name FROM item WHERE item_id = '$item_id'";
        $result_item = mysqli_query($con, $sql_item);
        if (!$result_item){
            exit (mysqli_error($con));
        }
        $r3 = mysqli_fetch_array($result_item);
        $sql_material = "SELECT material_desc FROM material WHERE material_id = '$material_id'";
        $result_material = mysqli_query($con, $sql_material);
        if (!$result_material){
            exit (mysqli_error($con));
        }
        $r4 = mysqli_fetch_array($result_material);
        $array_info=['enable_id'=>$r['enable_id'],'first_name'=>$r2['user_first_name'], 'last_name'=>$r2['user_last_name'], 'date_submitted'=>$r['date_submitted'], 'item_name'=>$r3['item_name'], 'material_name'=>$r4['material_desc'], 'size'=>$r['size'], 'image_filepath'=>$r['image_filepath'], 'due_date'=>$r['due_date'], 'message'=>$r['message'], 'status'=>$r['status'], 'figure'=>$r['figure_filepath'], 'instance'=>$r['instance_filepath'], 'bu_instance'=>$r['instance_filepath']];
        return $array_info;
    }
/*
 * Enable status
 * status: 0 = awaiting designer upload
status: 1 = awaiting EO staff approval
status: 2 = request accepted
status: 3 = request rejected
 */
    public static function pass_request($enable_id){
        global $con;
        $sql = "UPDATE enable SET enable.status='4' WHERE enable.enable_id = $enable_id";
        $query = mysqli_query($con, $sql);
        if (!$query){
            exit (mysqli_error($con));
        }
        return $query;
    }
    public static function make_request_pending($enable_id){
        global $con;
        $sql = "UPDATE enable
                SET enable.status = '1'
                WHERE enable.enable_id = $enable_id";
        $success = mysqli_query($con, $sql);
        if (!$success){
            echo (mysqli_error($con));
        }
        //email("pending", $enable_id);
        return $success;
    }
    
    public static function approve_request($enable_id)
    {
        global $con;
        $sql = "UPDATE enable
                SET enable.status = '2'
                WHERE enable.enable_id = $enable_id";
        $success = mysqli_query($con, $sql);
        if (!$success){
            echo (mysqli_error($con));
        }
        //email("pass", $enable_id);
        return $success;
    }

    public static function deny_request($enable_id)
    {
        global $con;
        $sql = "UPDATE enable
                SET enable.status = 3
                WHERE enable.enable_id = $enable_id";
        $success = mysqli_query($con, $sql);
        //email("fail", $enable_id);
        return $success;
    }

    public static function submit_enable($enable_id) {       
        // Uploads the files
        include_once "../../php/upload.php";
        global $con;

            
        $file1 = uploadEnable($con, 2, 1, $enable_id);
        $file2 = uploadEnable($con, 2, 2, $enable_id);
        $file3 = uploadEnable($con, 3, 3, $enable_id);
        
        if ($file1 === 0 || $file2 === 0 || $file3 === 0) {
            header('location: ../?enable_id=' . $enable_id);
            exit();
        } else {
    
            // If uploads successful, then no redirect, so insert files into database
            // Check if only 2 files were uploaded
            global $con;
            if ($file3) {
                $sql = "UPDATE enable SET figure_filepath='$file1', instance_filepath='$file2', bu_instance_filepath='$file3', status='1'
                  WHERE enable.enable_id = '$enable_id'";
            } else {
                $sql = "UPDATE enable SET figure_filepath='$file1', instance_filepath='$file2', status='1'
                  WHERE enable.enable_id = '$enable_id'";
            }
            $success = mysqli_query($con, $sql);
            if (!$success){
                echo mysqli_error($con);
            }
            //email("enable", $enable_id);
            return $success;
        }
    }

    public static function submit_enable_request($firstName, $lastName, $material_id, $email, $message, $item_id, $size, $detail_id)
    {
        global $con;

        $array_output=[];
        $image_filepath = "Placeholder";
        //Fixes the time differences
        date_default_timezone_set("America/Los_Angeles");
        //DATETIME format for SQL is YYYY-MM--DD HH-MI-SS
        $current_date = date("Y-m-d H:i:s");
        $due_date = date("Y-m-d H:i:s", strtotime('+36 hours'));

        //Looking up designer information
        $sql_designer = "SELECT item_designer, user_first_name, user_last_name, user_email FROM item, user_table WHERE item.item_id = $item_id AND item.item_designer = user_table.user_id";
        $result_designer = mysqli_query($con, $sql_designer);
        if (!$result_designer) {
            exit('$result_designer error: ' . mysqli_error($con));
        }
        while ($r = mysqli_fetch_array($result_designer)){
            $designer_first_name = $r['user_first_name'];
            $designer_last_name = $r['user_last_name'];
            $designer_email = $r['user_email'];
        }


        $designer_name = $designer_first_name." ".$designer_last_name;
        //Inserts the customer into the table - disregard duplicates
        $sql_customer_insert = "INSERT INTO user_table (user_first_name, user_last_name, user_email) VALUES ('$firstName', '$lastName', '$email')";
        if (mysqli_query($con, $sql_customer_insert)){
            $sql_user_id = "SELECT user_id FROM user_table WHERE user_first_name = '$firstName'";
            $result_user_id = mysqli_query($con, $sql_user_id);
            if (!$result_user_id){
                exit ('$result_user_id error: '.mysqli_error($con));
            }
            while ($r = mysqli_fetch_array($result_user_id)){
                $user_id = $r['user_id'];//this is needed for the next SQL statement to insert into enable requests table
            }
        } else {
            echo mysqli_error($con);
        }


//Inserts the enable request into the table
        $sql_insert = "INSERT INTO enable (user_id, date_submitted, item_id, material_id, size, image_filepath, due_date, message, status) VALUES ('$user_id', '{$current_date}', '$item_id', '$material_id', '$size', '$image_filepath', '{$due_date}', '$message', '0')";
        if (mysqli_query($con, $sql_insert)){
            $sql_enable_id = "SELECT enable_id FROM enable WHERE date_submitted = '$current_date'";
            $result_enable_id = mysqli_query($con, $sql_enable_id);
            if (!$result_enable_id) {
                exit('$result_enable_id error: ' . mysqli_error($con));
            }
            while ($r = mysqli_fetch_array($result_enable_id)){
                $enable_id = $r['enable_id'];//Needed in the email/text
            }
        } else {
            echo mysqli_error($con);
        }

// Uploads the file
        include_once "../../../php/upload.php";

        $file_type_num = 1;
        $dir = "../../../uploads/";
        $file = $_FILES["uploadButton"];
        $newFileName = helper::escape_str($con, $_REQUEST['newFileName']);

        $status_array = uploadFile($file_type_num, $file, $dir, $enable_id, $newFileName);
        $uploadOk = $status_array[0];
        $upload_message = $status_array[1];

        if ($uploadOk == 1){
            $_SESSION['error_message1'] = "";
            $image_filepath = $upload_message; // Update the order's image file path
            $sql_update = "UPDATE enable SET image_filepath = '$image_filepath' WHERE enable_id = '$enable_id'";
            mysqli_query($con, $sql_update);
            mysqli_commit($con);
            mysqli_autocommit($con, TRUE);
                      
        } else {  // There was an error uploading the file
            $_SESSION['error_message1'] = $upload_message;  // Change the error message
            mysqli_rollback($con); // Rollback the data just inserted
            mysqli_autocommit($con, TRUE);
            header('location: ../?detail_id=' . $detail_id);
            exit();
        }
        array_push($array_output, ['enable_id'=> $enable_id, 'designer_name'=>$designer_name, 'designer_email'=>$designer_email]);
        return $array_output;
    }
}

function uploadEnable($con, $file_type_num, $index, $enable_id) {
    $file_type_num = $file_type_num;
    $dir = "../../uploads/";
    $file = $_FILES["uploadButton" . $index];
    $newFileName = helper::escape_str($con, $_REQUEST['newFileName' . $index]);
    
    if ($file['size'] != 0) {
        $status_array = uploadFile($file_type_num, $file, $dir, $enable_id, $newFileName);
        $uploadOk = $status_array[0];
        $upload_message = $status_array[1];

        if ($uploadOk != 1){
            $_SESSION['error_message' . $index] = $upload_message;  // Change the error message
            mysqli_rollback($con); // Rollback the data just inserted
            mysqli_autocommit($con, TRUE);
            return 0;
        } else {
            $_SESSION['error_message' . $index] = "";
            return $upload_message; // should be file path if no error
        }
    } else {
        return null;
    }   
}

?>