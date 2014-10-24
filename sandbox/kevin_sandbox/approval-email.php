<?php
$to = "email@example.com";
$designer_name;
$enable_id;
$subject = "Enable Request has Passed Enable Review";
$message ="<html>
 <img src = 'images/logo.png'> <br>
From: designreview@emblemobjects.com<br>
Subject: Enable Request has Passed Enable Review<br>
Body:<br>
Designer ". $designer_name . "<br>
Your completed enable request" . $enable_id ." has passed Enable Review. An
email has been sent to the customer with order information. We hope they like the object and
buy it. Keep up the good work.<br>
Great Job!<br>
EmblemObjects Team</html>";
$headers = "<html>
<img src = 'images/logo.png'>
</html>";
$mail($to,$subject,$message,$headers);

?>