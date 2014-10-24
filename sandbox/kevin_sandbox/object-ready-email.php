<?php
$to = "email@example.com";
$enable_id;
$customer_name;
$image;
$link;
$subject = "Your Object is READY! Request: ". $enable_id;
$message = "<html> <img src = 'images/logo.png'> <br>
From: confirmation@emblemobjects.com<br>
Subject: Your Object is READY! Request: " . $enable_id . "<br>
Body:<br>
Dear" . $customer_name ."<br>
Thanks again for your submission! Our designers have been hard at work creating your
object. Below is a digital preview of your object and link to order.<br>
" . $image . "<br>Buy! " . $link .
"<br> We hope you like your object and hope to help you again on your creative endeavors!<br>
Thank you for working with us!<br>
EmblemObjects Team</html>";
$headers = "<html>
<img src = 'images/logo.png'>
</html>";
$mail($to,$subject,$message,$headers);
?>