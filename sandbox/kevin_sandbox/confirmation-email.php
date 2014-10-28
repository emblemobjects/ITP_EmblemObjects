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
?>