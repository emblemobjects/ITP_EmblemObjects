<?php
    include_once 'config.php';

    // Get the search input
    // If ends in 's', delete the s (i.e. Rings should also return results with the word Ring in them)
    $q = $_GET['q'];
    if (substr($q, -1) == "s") {
        $q = substr($q, 0, -1);
    }

   // Query using the search input 
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
        while($obj = mysqli_fetch_object($r)) {
            // Add it to the array
            $arr[] = $obj;
        }
        
        // Return the array
        echo json_encode($arr);
    }

    mysqli_close($con);
?>
