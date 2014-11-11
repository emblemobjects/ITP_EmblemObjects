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
        $array_info=['enable_id'=>$r['enable_id'],'first_name'=>$r2['user_first_name'], 'last_name'=>$r2['user_last_name'], 'date_submitted'=>$r['date_submitted'], 'item_name'=>$r3['item_name'], 'material_name'=>$r4['material_desc'], 'size'=>$r['size'], 'image_filepath'=>$r['image_filepath'], 'due_date'=>$r['due_date'], 'message'=>$r['message'], 'status'=>$r['status']];
        return $array_info;
    }
/*
 * Enable status
 * status: 0 = awaiting designer upload
status: 1 = awaiting EO staff approval
status: 2 = request accepted
status: 3 = request rejected
 */
    public static function approve_request($enable_id)
    {
        global $con;
        $sql = "UPDATE enable.status
                SET enable.status = 2
                WHERE enable.enable_id = $enable_id";
        $success = mysqli_query($con, $sql);
        email("pass", $enable_id);
        return $success;
    }

    public static function deny_request($enable_id)
    {
        global $con;
        $sql = "UPDATE enable.status
                SET enable.status = 3
                WHERE enable.enable_id = $enable_id";
        $success = mysqli_query($con, $sql);
        email("fail", $enable_id);
        return $success;
    }

    public static function submit_enable($enable_id, $file1, $file2, $file3)
    {
        global $con;
        $sql = "INSERT INTO enable
              VALUES ($enable_id, $file1, $file2, $file3)";
        $success = mysqli_query($con, $sql);
        email("enable", $enable_id);
        return $success;
    }

    public static function submit_enable_request($enable_id)
    {
        //incomplete, has this alraedy been done?
        global $con;
        $sql = "INSERT INTO enable
              VALUES ($enable_id)";
    }
}

?>