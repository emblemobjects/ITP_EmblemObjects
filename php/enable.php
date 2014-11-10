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
 * get enable info // includes stuff the designer submits
 */
include_once 'config.php';
class enable
{

    public static function get_request_info($enable_id)
    {
       $sql = "SELECT * FROM enable WHERE enable_id =";
    }
    public static function approve_request($enable_id)
    {

    }
   public static function deny_request($enable_id)
   {

   }
    public static function submit_request($enable_id){

    }
    public static function submit_enable($enable_id)
    {
        //may take in image files???
    }
}
?>