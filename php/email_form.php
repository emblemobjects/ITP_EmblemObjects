<?php
    include_once 'config.php';
/**
Function that takes in the email type, designer name, enable ID, and a recipient and sends an email to it
 * */

//variables from the form
$recipient = $template = $designer_id = $request_id = "";
//variables from SQL Server
$customer_name = $designer_name = $designer_email = $enable_link = $image = $link = $customer_email ="";
//variables from PHP form
$email_Ok = 1;
//make sure the inputs are valid
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $recipient = test_input($_REQUEST["recipient"]);
    $template = test_input($_REQUEST["template"]);
    $request_id = test_input($_REQUEST["request_id"]);
}
echo "RECIPIENT : " . $recipient . "\n";
echo "TEMPLATE : " . $template . "\n";
echo "REQUEST ID : " . $request_id . "\n";
//make sure the email is a valid format
//get variables from the form/ SQL database

/*
 * SELECT s the variables needed FROM the tables the variables are in WHERE the variables matches the other variables
 * in a different table, AND the variable to search for is the $given_variable
 * use WHERE ,AND if you have conditions to search inside the table
 */
    $sql_customer = "SELECT user_first_name, user_last_name, user_email
            FROM user_table, enable_request
            WHERE enable_request.user_id = user_table.user_id
            AND enable_request.request_id = $request_id";
//stores the variables into $result, $con = connection, $sql = query
    $customer_result = mysqli_query($con, $sql_customer);
//while loop, mysqli_fetch_array(variable ), checks the array for specific variables
//$row[' SELECT-ed variable ' ]
    while($rowC = mysqli_fetch_array($customer_result))
    {
        $customer_name = $rowC['user_first_name'] . " " . $rowC['user_last_name'];
        $customer_email = $rowC['user_email'];
    }
//fetch the ID
    $sql_item = "SELECT item_id
                FROM enable_request
                WHERE request_id = $request_id";
    $item_result = mysqli_query($con, $sql_item);
    while($rowI = mysqli_fetch_array($item_result)){
        $item_id = $rowI['item_id'];
    }
//fetch the designer name
    $sql_designer = "SELECT user_first_name, user_last_name, user_email
                    FROM user_table, item
                    WHERE item.item_id = $item_id
                    AND user_table.user_id = item.item_designer";
    $designer_result = mysqli_query($con, $sql_designer);
    while($rowD = mysqli_fetch_array($designer_result))
    {
        $designer_name = $rowD['user_first_name'] . " " . $rowD['user_last_name'];
        $designer_email = $rowD['user_email'];
    }
    $image = " [IMAGE]";
    $link = " [LINK] ";
    $enable_link = " [ENABLE_LINK] ";
/*      $customer_name = user_table.user_first_name . user_table.user_last_name
      $designer_name = user_table.user_first_name . user_table.user_last_name
      $enable_link = enable_request.image_filepath
      $image = enable_request.image_filepath
      $link = enable_request.image_filepath
      $designer_email = user_table.user_email";
*/
if(!filter_var($recipient, FILTER_VALIDATE_EMAIL)){
    $emailErr= "Invalid email format";
    $email_Ok = 0;
}
if($email_Ok == 1) {
    if ($template == "enableC") {
        //$to = $customer_email;
        $subject = "Your Design Request Confirmation : " . $request_id ;
        $message = "
         <handlebar-templates>
         <img src = '/images/logo.png'> <br />
            Dear " . $customer_name .
            ", Thank you for your design request submission. Your design request number is " . $request_id .
            " and your designer is " . $designer_name .
            ". Your designer will get to work on your design right away, turning your artwork into a unique product created just for you.
            <br>Within 48 hours, you will receive another email from EmblemObjects.com with your
            unique object ready to to order. Until then, your designer may wish to contact you from "
            . $designer_email . ".
            You are one step closer to creating something truly special with us!<br />
            Thank you for designing with us!<br />
            EmblemObjects Team<br />
            Note: This is a one time email, you have not been entered in any mailing list.
        </handlebar-templates>";
    } else if ($template == "passD") {
        //$to = $designer_email;
        $subject = "Enable Request has Passed Enable Review";
        $message = "<handlebar-templates>
         <img src = '/images/logo.png'> <br />
             Designer " . $designer_name . "<br />
            Your completed enable request " . $request_id . " has passed Enable Review. An
            email has been sent to the customer with order information. We hope they like the object and
            buy it. Keep up the good work.<br />
            Great Job!<br />
            EmblemObjects Team</handlebar-templates>";
    } else if ($template == "enableD") {
        //$to = $designer_email;
        $subject = "New Enable Request :" . $request_id;
        $message = "<handlebar-templates> <img src = '/images/logo.png'> <br />
        Designer " . $designer_name . ",<br />
        Congratulations! Customer" . $customer_name . " has asked you to enable their design!.<br />
        Remember, you have 36 hours to complete this request, before it is transferred to
        EmblemObjects Staff for completion.<br />"
            . $enable_link . "
        You can view the request information at the above link as well as submitting your files for
        enable review. Please let EmblemObjects Staff know in advance if you will not be able to
        complete this request. Good Luck!<br /><br />
        Thank you for working with us!<br />
        EmblemObjects Team
        </handlebar-templates>";
    } else if ($template == "passC") {
        //$to = $customer_email;
        $subject = "Your Object is READY! Request: ". $request_id;
        $message = "<handlebar-templates> <img src = '/images/logo.png'> <br />
        Dear " . $customer_name . "<br />
        Thanks again for your submission! Our designers have been hard at work creating your
        object. Below is a digital preview of your object and link to order. <br />
        " . $image . "<br />Buy! " . $link .
            "<br /> We hope you like your object and hope to help you again on your creative endeavors!<br />
        Thank you for working with us!<br />
        EmblemObjects Team</handlebar-templates>";
    } else if ($template == "failC") {
        //$to = $customer_email;
        $subject = "Your Object could not be printed: " . $request_id;
        $message = "<handlebar-templates> <img src = '/images/logo.png'><br />
        Dear " . $customer_name . "
        Our printer could not print you design with sufficient quality. The designer tried their best
        but technology has its limits. We will continue to work with our printers so that more design will
        be printable. Come back and check us out soon, maybe we can print it then! <br /> <br />
                See you soon!<br />
                EmblemObjects Staff";
    } else if ($template == "failD") {
        //$to = $designer_email;
        $subject = "Enable Request Failed Enable Review : " . $request_id;
        $message = "<handlebar-templates> <img src = '/images/logo.png'><br />
        Designer" . $designer_name . "
        Sorry, your enable did not pass out enable review. If you want to know, please contact:
        designreview@emblemobjects.com. Most likely, the detail was too fine to be printed or files is
        too large. There will always be more enable requests. <br /> <br />
                Keep on up the good work!<br />
                EmblemObjects Team";
    }

    echo $message;
    mail($recipient,$subject,$message);
    mysqli_close($con);
}
?>