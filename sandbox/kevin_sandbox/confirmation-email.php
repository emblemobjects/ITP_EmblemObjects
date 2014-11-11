<?php

$to = "somebody@example.com";
$subject = "Your Design Request Confirmation : " . $enableID ;
$enableID;
$customer_name;
$designer_name;
$designer_email;
$message = "
 <handlebar-templates>
 <img src = 'images/logo.png'> <br>
<p> From: confirmation@emblemobjects.com<br> Subject: Your Design Request Confirmation:" . $enable_id .
"Body:<br>Dear" . $customer_name .
", Thank you for your design request submission. Your design request number is " . $enableID .
" and your designer is ". $designer_name .
". Your designer will get to work on your design right away, turning your artwork into a unique product created just for you.
<br>Within 48 hours, you will receive another email from EmblemObjects.com with your
unique object ready to to order. Until then, your designer may wish to contact you from"
. $designer_email . ".
You are one step closer to creating something truly special with us!<br>
Thank you for designing with us!<br>
EmblemObjects Team<br>
Note: This is a one time email, you have not been entered in any mailing list.
</handlebar-templates>";
$headers = "<handlebar-templates>
<img src = 'images/logo.png'>
</handlebar-templates>";
//change brackets to variables
//add image header to the top of email images/logo.png
//use handlebar-templates format
mail($to,$subject,$message,$headers);


//putting unnecessary junk here
/*
 *         $customer_name = $item_name = $size = $material = $artwork = $file = "";
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
 */
?>