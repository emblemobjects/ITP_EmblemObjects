<?php
$to = "somebody@example.com";
//variables to retrieve
$enable_id;
$customer_name;
$enable_link;
$designer_name;
$subject = "New Enable Request :" . $enable_id;
$message = "<html> <img src = 'images/logo.png'> <br>
From: enable@emblemobjects.com<br>
Subject: New Enable Request:" . $enable_id +"<br>
Body:<br>
Designer" + $designer_name . ",<br>
Congratulations! Customer". $customer_name . "has asked you to enable their design!.<br>
Remember, you have 36 hours to complete this request, before it is transferred to
EmblemObjects Staff for completion.<br>"
. $enable_link . "
You can view the request information at the above link as well as submitting your files for
enable review. Please let EmblemObjects Staff know in advance if you will not be able to
complete this request. Good Luck!<br><br>
Thank you for working with us!<br>
EmblemObjects Team
</html>";
$headers = "<html>
<img src = 'images/logo.png'>
</html>";
$mail($to,$subject,$message,$headers);
?>