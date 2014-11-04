<?php

if (!empty($_REQUEST["query"]) || !empty($_REQUEST["class"]) || !empty($_REQUEST["category"]) || !empty($_REQUEST["subcategory"])) {
    include_once 'config.php';
    echo("<script>console.log('FORM SUBMITTED');</script>");
    
    $q = null;
    $class = null;
    $category = null;
    $subcategory = null;
   
    $accessories = array("Cases", "Keychains", "Belts & Buckles");
    $art = array("Sculptures", "Parametics", "Themed");
    $gadgets = array("Parts", "Props");
    $home = array("Placements", "Holders", "Vases", "Lighting", "Desktop");
    $novelty = array("Desk Toys", "Puzzles");
    $jewelry = array("Rings", "Pendants", "Necklaces", "Bracelets", "Earrings", "Cufflinks", "Watches");
   
    $store = array("Accessories", "Art", "Gadgets", "Home", "Novelty", "Jewelry");
    $designers = array("Jacob Blitzer");
    $collections = array("Launch Collection");
    
    
    if (!empty($_REQUEST["query"])) {
        $q = $_GET["query"];
        if (substr($q, -1) == "s") {
            $q = substr($q, 0, -1);
        }
        
        // Query the database
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
    }
    
    if (!empty($_REQUEST["class"])) {
        $class = $_GET["class"];
        if ($class == "STORE") {
            echo "<script>window.location = '../home';</script>";
        }
        if ($class == "DESIGNERS") {
            // Do something
        }
        if ($class == "COLLECTIONS") {
            // Do something
        }
    }
    
    if (!empty($_REQUEST["category"])) {
        $category = $_GET["category"];
        echo("<script>console.log('Category: ".$category."');</script>");
        if (in_array($category, $store)) {
            $class = "Store";
        }
        if (in_array($category, $designers)) {
            $class = "Designers";
        }
        if (in_array($category, $collections)) {
            $class = "Collections";
        }
        switch ($class){
            case "Store":
                $sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
                    FROM item, item_category, item_subcategory, user_table, collection
                    WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id
                    AND category_desc LIKE '" . $category . "%'";
                break;
            case "Designers":
                $sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
                    FROM item, item_category, item_subcategory, user_table, collection
                    WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id
                    AND CONCAT(user_first_name,' ', user_last_name) LIKE '" . $category . "%'";
                break;
            case "Collections":
                $sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
                    FROM item, item_category, item_subcategory, user_table, collection
                    WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id
                    AND collection_desc LIKE '" . $category . "%'";
                break;
            default:
                echo "<script> document.location.href='../home';</script>";
        }  
    }
    
    
    // Return a JSON string of the relevant database rows
    $arr = array();      
    $r = mysqli_query($con, $sql);
    if (!$r){
        echo mysqli_error($con);
    } else {
        // While there is still an object to fetch
        while($obj = mysqli_fetch_object($r)) {
            // Add it to the array
            $arr[] = $obj;
        }
        
        // Return the array
        //echo json_encode($arr);
    }

    mysqli_close($con);
    
    echo("<script>console.log('search results: ".json_encode($arr)."');</script>");
    
    
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
                        if ($q) {
                            echo "<p>You seached for a:</p>";
                            echo "<h1>" . $q . "</h1>";
                            echo "<p>Check the console for your results!</p>";
                        }
                        if ($class) {
                            echo "<p>" . $class . "</p>";
                        }
                        if ($category) {
                            echo "<p>". $category . "</p>";
                        }
                        if ($subcategory) {
                            echo "<p>". $subcategory . "</p>";
                        } else {
                            echo "<p>WHy am i here?</p>";
                        }
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
    
<?php
} else {
    
    // No search criteria entered, just return the homepage
    echo("<script>console.log('FORM NOT SUBMITTED');</script>");
    header('location: <?php echo $Dir;?>/home');
}


?>