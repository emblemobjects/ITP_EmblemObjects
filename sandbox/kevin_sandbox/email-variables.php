<!DOCTYPE html>
<html>
<body>
 <?php
    echo "Sending Email";
    $to;
    $subject;
    $headers = "From confirmation@emblemobjects.com \n
    $message = "Dear [Name] \n message ";
    Subject: [Subject] \n Body : \n";
    $message = wordwrap($message,70);//limit lines to 70(?)characters
    mail($to,$subject,$message, $headers);//mail to this on click
 ?>
</body>
</html>
