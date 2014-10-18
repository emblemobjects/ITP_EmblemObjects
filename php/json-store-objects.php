<?php
/**
 * Created by PhpStorm.
 * User: Angela
 * Date: 10/16/2014
 * Time: 6:48 PM
 */
include_once 'db-connect-con.php';
//sql statement to select (maybe do a view?)
$sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
        FROM item, item_category, item_subcategory, user_table, collection
        WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id";
$items_results = mysqli_query($con, $sql);

$items_array = array();

if (!$items_results){
    echo mysqli_error($con);
}
else {
    $i = 0; // This keeps the first one separate from the rest
    while ($row = mysqli_fetch_array($items_results)) {
        //pushing another array to the second dimension
        array_push($items_array, array('id'=>$row['item_id'], 'tag'=>$row['item_tag'], 'subcategory'=>$row['subcategory_desc'], 'name'=>$row['item_name'], 'designer_first_name'=>$row['user_first_name'], 'designer_last_name'=>$row['user_last_name'], 'description'=>$row['item_description'], 'category'=>$row['category_desc'], 'type'=>$row['item_type'], 'collection_name'=>$row['collection_desc']));
    }
}

$items_json = json_encode($items_array);

?>
<script>
    var store = window.store || {};

    store.items = <?php echo $items_json; ?>; // this creates the JSON
    console.log(store.items); //temporary, to look at the object
</script>
