<?php
    
if (empty($_REQUEST["query"])) {
    header("location: $Dir/home");
} else {
    
   // readfile("http://localhost:8080/itp460/ITP_EmblemObjects/home");
    
    include_once 'config.php';
    $q = $_GET["query"];
    if (substr($q, -1) == "s") {
        $q = substr($q, 0, -1);
    }
    
    $sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
            FROM item, item_category, item_subcategory, user_table, collection
            WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id
            AND (item_name LIKE '" . $q . "%'
            OR item_tag LIKE '" . $q . "%'
            OR category_desc LIKE '" . $q . "%'
            OR subcategory_desc LIKE '" . $q . "%'
            OR user_first_name LIKE '" . $q . "%'
            OR user_last_name LIKE '" . $q . "%'
            OR collection_desc LIKE '" . $q . "%')";

    // Return a JSON string of the relevant database rows
    $arr = array();      
    $r = mysqli_query($con, $sql);
    if (!$r){
        echo mysqli_error($con);
    } else {
        // While there is still an object to fetch
        $index = 0;
        while($obj = mysqli_fetch_assoc($r)) {
            // Add it to the array
            $arr[] = $obj;
            $index++;
        }
    }
    echo("<script>console.log(".json_encode($arr).");</script>");
    
    ?>
    
    
    <!doctype html>


    <html lang="en">
    <head>
        <title>Emblem Objects</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
        <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/header.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/nav.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/body.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/content.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/footer.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/home.css">
    </head>


    <body>
        <div id="wrapper">
            <div id="header"></div>
            <div style="clear:both"></div>
            <div id="navigation"></div>
            <div style="clear:both"></div>
        
            <!-- CONTENT -->
            <div id="content">
                <div class="container">
                
                <!-- Container to hold the objects -->
                    <div id="objects-display">
                        
                        <?php
                        echo "<p>You seached for a:</p>";
                        echo "<h1>" . $q . "</h1>";
                        echo "<p>Check the console for your results!</p>";
                        ?>
        
                    </div>
                </div>
            </div>
            <div style="clear:both"></div>
    
            <div id="footer"></div>
            <div style="clear:both"></div>
        </div>
    
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <?php include "../templates/header.php";?>
        <script type="text/javascript" src="<?php echo $Dir;?>/js/json-search-db.js"></script>
        <script src="<?php echo $Dir;?>/js/handlebars-v2.0.0.js"></script>
        <script src="<?php echo $Dir;?>/js/home.js"></script>
    
    </body>
</html>

<?php }
mysqli_close($con);
?>