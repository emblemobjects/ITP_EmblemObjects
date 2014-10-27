<?php
/**
 * Created by PhpStorm.
 * User: Angela
 * Date: 10/19/2014
 * Time: 9:55 PM
 */

include_once 'config.php';
//sql statement to select (maybe do a view?)
$sql = "SELECT item_id, item_tag, subcategory_desc, item_name, user_first_name, user_last_name, item_description, category_desc, item_type, collection_desc
        FROM item, item_category, item_subcategory, user_table, collection
        WHERE item.subcategory_id = item_subcategory.subcategory_id AND item_subcategory.category_id = item_category.category_id AND item.item_designer = user_table.user_ID AND item.collection_id = collection.collection_id";
$items_results = mysqli_query($con, $sql);

$items_array = array();

// Error Check - items results
// if (!$items_results) {
//     exit('$items_results error: ' . mysqli_error($con));
// }

while ($items_row = mysqli_fetch_array($items_results)) {
    // current item_id
    $item_id = $items_row['item_id'];

    /* 
     * image of current item_id
     */
    //reset image array
    $image_array = array();

    // Select all images with current item_id
    $image_sql = "SELECT material_id, image_filepath, item_id, is_primary FROM item_image WHERE item_id = $item_id";

    $image_results = mysqli_query($con, $image_sql);
    // Error Check - image results
    // if (!$image_results) {
    //     exit('$image_results error: ' . mysqli_error($con));
    // }

    while ($image_row = mysqli_fetch_array($image_results)) {
        array_push($image_array, array('material_id' => $image_row['material_id'], 'image_filepath' => $image_row['image_filepath'], 'is_primary' => $image_row['is_primary']));//4th dimension array
    }


    /* 
     * detail of current item_id
     */
    //reset details array
    $detail_array = array();

    // Select all details with current item_id
    $detail_sql = "SELECT item_detail_id, item_raw_price, item_detail.material_id, material_desc, item_size FROM item_detail, material WHERE item_detail.material_id = material.material_id AND item_detail.item_id = $item_id";
    
    $detail_results = mysqli_query($con, $detail_sql);
    // Error Check - detail results
    if (!$detail_results) {
         exit('$detail_results error: ' . mysqli_error($con));
     }

    while ($detail_row = mysqli_fetch_array($detail_results)) {
        array_push($detail_array, array('detail_id' => $detail_row['item_detail_id'],'material_id'=>$detail_row['material_id'],'price' => $detail_row['item_raw_price'], 'material' => $detail_row['material_desc'], 'size' => $detail_row['item_size']));
    }

    //pushing another array to the second dimension
    array_push($items_array, array('id' => $items_row['item_id'], 'tag' => $items_row['item_tag'], 'subcategory' => $items_row['subcategory_desc'], 'name' => $items_row['item_name'], 'designer_first_name' => $items_row['user_first_name'], 'designer_last_name' => $items_row['user_last_name'], 'description' => $items_row['item_description'], 'category' => $items_row['category_desc'], 'type' => $items_row['item_type'], 'collection_name' => $items_row['collection_desc'], 'details' => $detail_array, 'images' => $image_array));
}

$items_json = json_encode($items_array);

?>
<script>
    var store = window.store || {};

    store.items = <?php echo $items_json; ?>; // this creates the JSON
    console.log(store.items); //temporary, to look at the object
</script>


