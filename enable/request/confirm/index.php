<?php
include_once '../php/config.php';
include_once '../php/helper.php';

//Catching people who got here without filling out the form
if (empty($_REQUEST['firstName'])) {
    $valid = false;
} else { $valid = true; }

helper::redirect_page($valid,'/customize/index.php');

session_start();

//Catching people who got here without filling out the form
if (empty($_REQUEST['firstName'])) {
    //header('location: index.php');
}

//Fixes the time differences
date_default_timezone_set("America/Los_Angeles");
//DATETIME format for SQL is YYYY-MM--DD HH-MI-SS
$current_date = date("Y-m-d H:i:s");
$due_date = date("Y-m-d H:i:s", strtotime('+36 hours'));
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$material_id = $_REQUEST['material_id'];
$email = $_REQUEST['email'];
$message = $_REQUEST['message'];
$item_id = $_REQUEST['item_id'];
$size = $_REQUEST['size'];


// Store session information in case uploading the file throws an error
$_SESSION['first_name'] = $firstName;
$_SESSION['last_name'] = $lastName;
$_SESSION['email'] = $email;
$_SESSION['message'] = $message;


//Declaring the variables for use later
$user_id = 0;
$enable_id = 0;

//PLACEHOLDERS that needs to be replaced by functions
$target_dir = "../uploads/";
$image_filepath = "/uploads/placeholder.png";
$status = 0;

/* disable autocommit */
mysqli_autocommit($con, FALSE);

//Looking up designer information
$sql_designer = "SELECT item_designer, user_first_name, user_last_name, user_email FROM item, user_table WHERE item.item_id = $item_id AND item.item_designer = user_table.user_id";
$result_designer = mysqli_query($con, $sql_designer);
if (!$result_designer) {
    exit('$result_designer error: ' . mysqli_error($con));
}
while ($r = mysqli_fetch_array($result_designer)){
    $designer_first_name = $r['user_first_name'];
    $designer_last_name = $r['user_last_name'];
    $designer_email = $r['user_email'];
}

$designer_name = $designer_first_name." ".$designer_last_name;
//Inserts the customer into the table - disregard duplicates
$sql_customer_insert = "INSERT INTO user_table (user_first_name, user_last_name, user_email) VALUES ('$firstName', '$lastName', '$email')";
if (mysqli_query($con, $sql_customer_insert)){
    $sql_user_id = "SELECT user_id FROM user_table WHERE user_first_name = '$firstName'";
    $result_user_id = mysqli_query($con, $sql_user_id);
    if (!$result_user_id){
        exit ('$result_user_id error: '.mysqli_error($con));
    }
    while ($r = mysqli_fetch_array($result_user_id)){
        $user_id = $r['user_id'];//this is needed for the next SQL statement to insert into enable requests table
    }
} else {
    echo mysqli_error($con);
}


//Inserts the enable request into the table
$sql_insert = "INSERT INTO enable_request (user_id, date_submitted, item_id, material_id, size, image_filepath, due_date, message, status) VALUES ('$user_id', '{$current_date}', '$item_id', '$material_id', '$size', '$image_filepath', '{$due_date}', '$message', '$status')";
if (mysqli_query($con, $sql_insert)){
    $sql_enable_id = "SELECT request_id FROM enable_request WHERE date_submitted = '$current_date'";
    $result_enable_id = mysqli_query($con, $sql_enable_id);
    if (!$result_enable_id) {
        exit('$result_enable_id error: ' . mysqli_error($con));
    }
    while ($r = mysqli_fetch_array($result_enable_id)){
        $enable_id = $r['request_id'];//Needed in the email/text
    }
} else {
    echo mysqli_error($con);
}


// Uploads the file
include "../php/upload.php";

$file_type_num = 1;
$dir = "../uploads/";
$file = $_FILES["uploadButton"];
$newFileName = $_REQUEST['newFileName'];

$status_array = uploadFile($file_type_num, $file, $dir, $enable_id, $newFileName);
$uploadOk = $status_array[0];
$upload_message = $status_array[1];

if ($uploadOk == 1){
    $image_filepath = $upload_message; // Update the order's image file path
    $sql_update = "UPDATE enable_request SET image_filepath = '$image_filepath' WHERE request_id = '$enable_id'";
    mysqli_query($con, $sql_update);
    mysqli_commit($con);
    mysqli_autocommit($con, TRUE);
} else {  // There was an error uploading the file
    $_SESSION['error_message'] = $upload_message;  // Change the error message
    mysqli_rollback($con); // Rollback the data just inserted
    mysqli_autocommit($con, TRUE);
    header('location: ../customize/');
    exit();
}

// If successful, clear and destroy the session
session_unset();
session_destroy(); 

?>



<!doctype html>
<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/navigation.css">
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/customize.css">


</head>


<body>
<div id="wrapper">
    <?php include "../templates/header.php"; ?>
    <div id="content">
        <div id="confirmationContent">
            <h1 style="text-align:left;">ENABLE REQUEST CONFIRMATION #<?php echo $enable_id ?></h1>
    <span>
        <p>Thank you for your design request submission. Your design request number is <strong><?php echo $enable_id ?></strong> and your designer is <strong><?php echo $designer_name ?></strong>. Your designer will get
            to work on your design right away, turning your artwork into a unique product created just for you.</p>
        <p>Please check the email you provided: <strong><?php echo $email ?></strong> for a confirmation message.</p>
        <p>Within 48 hours, you will receive another email from EmblemObjects.com with your
            unique object ready to to order. Until then, your designer may wish to contact you from <strong><?php echo $designer_email ?></strong>.</p>
        <p>You are one step closer to creating something truly special with us!</p>
        <p>Thank you for designing with us!</p>

            <p>EmblemObjects Team</p>
    </span>
        </div>
    </div>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <?php include "../templates/footer.php"; ?>
</html>
