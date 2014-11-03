<?php
    
if (empty($_REQUEST["query"]) && empty($_REQUEST["class"]) && empty($_REQUEST["category"]) && empty($_REQUEST["subcategory"])) {
    echo("<script>console.log('IN HERE ');</script>");
    header("location: $Dir/home");
} else {
    
    include_once 'config.php';
   // readfile("http://localhost:8080/itp460/ITP_EmblemObjects/home");
   
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
   
   
    echo("<script>console.log('HELLO');</script>");
   
    $sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc";
    $sql .= "FROM item, item_category, item_subcategory, user_table, collection";
    $sql .= "WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id";
    echo("<script>console.log('sql: ".$sql."');</script>");
    if (!empty($_REQUEST["subcategory"])){
        $subcategory = $_GET["subcategory"];
        if (in_array($subcategory, $accessories)) {
            $category = "Accessories";
        }
        if (in_array($subcategory, $art)) {
            $category = "Art";
        }
        if (in_array($subcategory, $gadgets)) {
            $category = "Gadgets";
        }
        if (in_array($subcategory, $home)) {
            $category = "Home";
        }
        if (in_array($subcategory, $novelty)) {
            $category = "Novelty";
        }
        if (in_array($subcategory, $jewelry)) {
            $category = "Jewelry";
        }
        $sql .= "AND category_desc LIKE '" . $category . "%'";
        $sql .= "AND subcategory_desc LIKE '" . $subcategory . "%'";       
    } else {
        if (!empty($_REQUEST["category"])){           
            $category = $_GET["category"];
            echo("<script>console.log('search results: ". $category ."');</script>");
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
                case "STORE":
                    $sql .="AND (category_desc LIKE '" . $category . "')";
                    break;
                case "DESGINERS":
                    $sql .="AND (CONCAT(user_first_name,'',user_last_name) LIKE '" . $category . "')";
                    break;
                case "COLLECTIONS":
                    $sql .="AND (collection_desc LIKE '" . $category . "')";
                    break;
            }

        } else {               
                $q = $_GET["query"];
                if (substr($q, -1) == "s") {
                    $q = substr($q, 0, -1);
                }
                echo("<script>console.log('sql: ".$sql."');</script>");
                
                $sql .= "AND (item_name LIKE '" . $q . "%'";
                echo("<script>console.log('sql: ".$sql."');</script>");
                $sql .= "OR item_tag LIKE '" . $q . "%'";
                $sql .= "OR category_desc LIKE '" . $q . "%'";
                $sql .= "OR subcategory_desc LIKE '" . $q . "%'";
                $sql .= "OR user_first_name LIKE '" . $q . "%'";
                $sql .= "OR user_last_name LIKE '" . $q . "%'";
                $sql .= "OR collection_desc LIKE '" . $q . "%')";
                
     //           AND (item_name LIKE '" . $q . "%'
    //        OR item_tag LIKE '" . $q . "%'
    //        OR category_desc LIKE '" . $q . "%'
    //        OR subcategory_desc LIKE '" . $q . "%'
    //        OR user_first_name LIKE '" . $q . "%'
    //        OR user_last_name LIKE '" . $q . "%'
    //        OR collection_desc LIKE '" . $q . "%')";
                
                echo("<script>console.log('sql: ".$sql."');</script>");
        }
    }
    
    
    
    
    //if (!empty($_REQUEST["subcategory"])){
    //    $subcategory = $_GET["subcategory"];
    //    $category = $_GET["category"];
    //    $class = $_GET["class"];
    //    $sql = "AND category_desc LIKE '" . $category . "%'
    //            AND subcategory_desc LIKE '" . $subcategory . "%'";       
    //} else {
    //    if (!empty($_REQUEST["category"])){
    //        $category = $_GET["category"];
    //        $class = $_GET["class"];
    //        switch ($class){
    //            case "STORE":
    //                $sql +="AND (category_desc LIKE '" . $category . "')";
    //            case "DESGINERS":
    //                $sql +="AND (CONCAT(user_first_name,'',user_last_name) LIKE '" . $category . "')";
    //            case "COLLECTIONS":
    //                $sql +="AND (collection_desc LIKE '" . $category . "')";
    //        }
    //
    //    } else {               
    //            $q = $_GET["query"];
    //            if (substr($q, -1) == "s") {
    //                $q = substr($q, 0, -1);
    //            }               
    //            $sql = "AND (item_name LIKE '" . $q . "%'
    //                    OR item_tag LIKE '" . $q . "%'
    //                    OR category_desc LIKE '" . $q . "%'
    //                    OR subcategory_desc LIKE '" . $q . "%'
    //                    OR user_first_name LIKE '" . $q . "%'
    //                    OR user_last_name LIKE '" . $q . "%'
    //                    OR collection_desc LIKE '" . $q . "%')";
    //    }
    //}
    //
    //
    
    
    //$sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
    //        FROM item, item_category, item_subcategory, user_table, collection
    //        WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id
    //        AND (item_name LIKE '" . $q . "%'
    //        OR item_tag LIKE '" . $q . "%'
    //        OR category_desc LIKE '" . $q . "%'
    //        OR subcategory_desc LIKE '" . $q . "%'
    //        OR user_first_name LIKE '" . $q . "%'
    //        OR user_last_name LIKE '" . $q . "%'
    //        OR collection_desc LIKE '" . $q . "%')";

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
    echo("<script>console.log('search results: ".json_encode($arr)."');</script>");
    
    ?>
    
    
    <!doctype html>
]

    <html lang="en">
    <head>
        <title>Emblem Objects</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
        <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/header.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/navigation.css">
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

<?php }
mysqli_close($con);
?>



