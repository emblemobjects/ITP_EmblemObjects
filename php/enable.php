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

    $function_call = $request_id = " ";
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $function_call = test_input($_REQUEST["function"]);
        $request_id = test_input($_REQUEST["request_id"]);
    }
    if($function_call == "get-request"){
        get_request_info($request_id);
    }else if ($function_call == "approve-request"){
        approve_request($request_id);
    }else if ($function_call == "deny-request"){
        deny_request($request_id);
    }else if ($function_call == "get-enable"){
        get_enable_info($request_id);
    }else if ($function_call == "submit-enable-request"){
        submit_enable_request($request_id);
    }else if ($function_call == "submit-enable"){
        submit_enable($request_id);
    }
    function get_request_info($request_id)
    {
        $customer_name = $item_name = $size = $material = $artwork = $file = "";
        $item_id = $material_id= "";
        $con = mysqli_connect("uscitp.com", "itp460_admin","usc2014", "itp460_emblemobjects");
//getting customer information
        $sql_customer = "SELECT user_first_name, user_last_name
            FROM user_table, enable
            WHERE enable.user_id = user_table.user_id
            AND enable.enable_id = $request_id";
        $customer_result = mysqli_query($con, $sql_customer);
        while($rowC = mysqli_fetch_array($customer_result))
        {
            $customer_name = $rowC['user_first_name'] . " " . $rowC['user_last_name'];
        }
//getting item_id using request_id, getting filepath and images
        $sql_item = "SELECT enable.item_id, enable.image_filepath
                    FROM enable, item
                    WHERE enable.enable_id = $request_id";
        $item_result = mysqli_query($con, $sql_item);
        while($rowI = mysqli_fetch_array($item_result))
        {
            $item_id = $rowI['item_id'];
            $artwork = $rowI['image_filepath'];
            $file = $rowI['image_filepath'];
        }
//getting more specific item information
        $sql_item2 = "SELECT item_name, item_size, material_id
                    FROM item, item_detail
                    WHERE item_detail.item_id = $item_id
                    AND item.item_id = $item_id";
        $item_result2 = mysqli_query($con, $sql_item2);
        while($rowI2 = mysqli_fetch_array($item_result2))
        {
            $material_id = $rowI2['material_id'];
            $item_name = $rowI2['item_name'];
            $size = $rowI2['item_size'];
        }
//getting material name
        $sql_material = "SELECT material_desc
                        FROM material
                        WHERE material.material_id = $material_id";
        $material_result = mysqli_query($con, $sql_material);
        while($rowM = mysqli_fetch_array($material_result))
        {
            $material = $rowM['material_desc'];
        }
        echo "Enable Request Object : " .
            "\n Enable ID #" . $request_id .
            "\n Requested by : " . $customer_name .
            "\n Item Name : " . $item_name .
            "\n Size : " . $size .
            "\n Material : " . $material .
            "\n Artwork : " . $artwork .
            "\n File : " . $file;
    }
    function get_enable_info($request_id)
    {//gets the request ID and enable info
        $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        $sql = "SELECT * FROM enable_request WHERE request_id = $request_id";
    }
   function approve_request($request_id)
    {
        $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        $sql = "SELECT * FROM enable_request WHERE request_id = $request_id";

    }
    function deny_request($request_id)
   {
       $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
       $sql = "SELECT * FROM enable_request WHERE request_id = $request_id";

   }
     function submit_enable_request($request_id)
     {
         $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
         $sql = "SELECT * FROM enable_request WHERE request_id = $request_id";

    }
    function submit_enable($request_id)
    {
        $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        //may take in image files???
        $sql = "SELECT * FROM enable_request WHERE request_id = $request_id";

    }

?>