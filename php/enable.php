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
 * get_request_info - gets the request information using a request_id
 * update function - request approve
 * update function - request denied
 * submit enable request
 * submit enable // when designer uploads related files
 * get enable info // includes stuff the designer submits
 */
include_once 'config.php';
class enable
{

    public static function get_request_info($request_id)
    {
       $sql = "SELECT * FROM enable WHERE enable_id = ";
    }
    public static function get_enable_info($request_id)
    {//gets the request ID and enable info

    }
    public static function approve_request($request_id)
    {

    }
   public static function deny_request($request_id)
   {

   }
    public static function submit_enable_request($request_id){

    }
    public static function submit_enable($request_id)
    {
        //may take in image files???
    }
}
?>