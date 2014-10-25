<?php
    include_once 'db-connect-con.php';
/**
Function that takes in the email type, designer name, enable ID, and a recepient and sends an email to it
 * */

//variables from the form
$recipient = $template = $designer_id = $enable_id = "";
//variables from SQL Server
$customer_name = $designer_name = $designer_email = $enable_link = $image = $link = "";
//varuables from PHP form
$email_Ok = 1;
//make sure the inputs are valid
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $recipient = test_input($_REQUEST["recipient"]);
    $template = test_input($_REQUEST["template"]);
    $designer_id= test_input($_REQUEST["designer_id"]);
    $enable_id = test_input($_REQUEST["enable_id"]);//request_id ??
}

//make sure the email is a valid format
//get variables from the form/ SQL database
    $sql = "SELECT request_id, customer_id, image_filepath, user_email,
      user_first_name
      FROM design_request, user_table
      ";//WHERE? 
    $customer_name = mysql_query("SELECT"); //customer ID?
    $designer_name = mysql_query("SELECT");//user first name
    $enable_link = mysql_query("SELECT");//???
    $image = mysql_query("SELECT");//image_filepath
    $link = mysql_query("SELECT");//???
    $designer_email = mysql_query("SELECT");//user email

if(!filter_var($recipient, FILTER_VALIDATE_EMAIL)){
    $emailErr= "Invalid email format";
    $email_Ok = 0;
}
if($email_Ok == 1) {
    if ($template == "confirmation") {
        $subject = "Your Design Request Confirmation : " . $enable_id ;
        $message = "
         <html>
         <img src = '../images/logo.png'> <br />
            Dear" . $customer_name .
            ", Thank you for your design request submission. Your design request number is " . $enable_id .
            " and your designer is " . $designer_name .
            ". Your designer will get to work on your design right away, turning your artwork into a unique product created just for you.
            <br>Within 48 hours, you will receive another email from EmblemObjects.com with your
            unique object ready to to order. Until then, your designer may wish to contact you from"
            . $designer_email . ".
            You are one step closer to creating something truly special with us!<br />
            Thank you for designing with us!<br />
            EmblemObjects Team<br />
            Note: This is a one time email, you have not been entered in any mailing list.
        </html>";
    } else if ($template == "approval") {
        $subject = "Enable Request has Passed Enable Review";
        $message = "<html>
         <img src = '../images/logo.png'> <br />
             Designer " . $designer_name . "<br />
            Your completed enable request" . $enable_id . " has passed Enable Review. An
            email has been sent to the customer with order information. We hope they like the object and
            buy it. Keep up the good work.<br />
            Great Job!<br />
            EmblemObjects Team</html>";
    } else if ($template == "enable") {
        $subject = "New Enable Request :" . $enable_id;
        $message = "<html> <img src = '../images/logo.png'> <br />
        Designer" . $designer_name . ",<br />
        Congratulations! Customer" . $customer_name . "has asked you to enable their design!.<br />
        Remember, you have 36 hours to complete this request, before it is transferred to
        EmblemObjects Staff for completion.<br />"
            . $enable_link . "
        You can view the request information at the above link as well as submitting your files for
        enable review. Please let EmblemObjects Staff know in advance if you will not be able to
        complete this request. Good Luck!<br /><br />
        Thank you for working with us!<br />
        EmblemObjects Team
        </html>";
    } else if ($template == "ready") {
        $subject = "Your Object is READY! Request: ". $enable_id;
        $message = "<html> <img src = '../images/logo.png'> <br />
        Dear" . $customer_name . "<br />
        Thanks again for your submission! Our designers have been hard at work creating your
        object. Below is a digital preview of your object and link to order.<br />
        " . $image . "<br />Buy! " . $link .
            "<br /> We hope you like your object and hope to help you again on your creative endeavors!<br />
        Thank you for working with us!<br />
        EmblemObjects Team</html>";
    }
    mail($to,$subject,$message);
    mysql_close($con);
}
?>